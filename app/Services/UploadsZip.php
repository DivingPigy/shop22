<?php

namespace App\Services;

use Zipper;
use Illuminate\Support\Facades\Storage;

class UploadsZip{

    protected $file;
    protected $import;
    protected $disk;

    public function __construct($data)
    {
        $this -> file = $data['zip'];
        $this -> import = $data['import_id'];
        $this -> disk = Storage::disk(config('const.storage'));
    }

    /**
     * 存储上传的压缩包
     *
     * @return array files path
     */
    public function storeImage()
    {
        $files = $this -> save();
        return $files;
    }

    /**
     * 保存新上传的照片压缩包
     *
     * @return array image files path
     */
    private function save()
    {
        //确定上传文件夹 /public/upload/zip/import-id-随机字符串
        $directory = $this -> creatUploadDirectory();
        //报错上传文件，并且命名
        $result = $this -> disk -> put( $directory , $this -> file);
        $newFileName = $this -> uploadFileName($directory);
        $this -> disk -> move( $result , $newFileName);

        //Zip插件必须读取实际的文件位置才行，否则从web根目录下面就开始读取
        $newFileName = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $newFileName);
        $inventory = $this -> creatInventoryDirectory();
        $extractDirectory = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $inventory);
        
        //读取保存的上传文件，并解压到库存文件夹中
        Zipper::make($newFileName) -> extractTo($extractDirectory);
        $files = $this -> disk -> allFiles($inventory);
        return $files;
    }

    /**
     * 创建保存解析的照片文件夹
     *
     * @return string path
     */
    private function creatInventoryDirectory()
    {
        return 'inventory' . DIRECTORY_SEPARATOR . 'import-' . $this -> import . '-' . str_random(5) . DIRECTORY_SEPARATOR;
        return storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $directory);
    }

    /**
     * 创建上传文件夹
     *
     * @return string directory name
     */
    private function creatUploadDirectory()
    {
        return 'upload' . DIRECTORY_SEPARATOR . 'zip' . DIRECTORY_SEPARATOR . 'import-' . $this -> import . '-' . str_random(5) . DIRECTORY_SEPARATOR;
    }

    /**
     * 命名新创建的文件名称
     *
     * @param [string] $directory
     * @return string new name
     */
    private function uploadFileName($directory)
    {
        return $directory . $this -> file -> getClientOriginalName();
    }
}