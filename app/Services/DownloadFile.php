<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use App\Models\Inventory;
use App\Exports\CodeExport;
use Excel;
use Zipper;

class DownloadFile{
    protected $id;
    protected $disk;

    public function __construct(int $id)
    {
        $this -> id = $id;
        $this -> disk = Storage::disk(config('const.storage'));
    }

    /**
     * 产生下载的订单文件
     *
     * @return void
     */
    public function generateDownloadFile()
    {
        $directory = $this -> creatDownloadDirectory();
        $inventories = Inventory::where('order_id' , $this -> id) -> get();   

        $images = $inventories -> where('type' , config('const.TYPE_IMAGE'));
        foreach($images as $key => $value){
            $this -> disk -> copy($value -> content  ,  $directory . ($key + 1) . ".jpg" );
        }

        Excel::store(new CodeExport($this -> id) , './public/' . $directory  . '/code.xlsx');

        $files = $this -> disk -> allFiles($directory);
        $zipPath = storage_path('app/public/') . $directory . 'code.zip';
        $zip = Zipper::make($zipPath );
        foreach($files as $file){
            $zip -> add(storage_path('app/public/') . $file);
        }
        $zip -> close();
        return $directory . 'code.zip';
    }

    /**
     * 生成下载文件的文件夹
     *
     * @return void
     */
    private function creatDownloadDirectory()
    {
        return 'download' . DIRECTORY_SEPARATOR . 'order-' . $this -> id . DIRECTORY_SEPARATOR;
    }
}