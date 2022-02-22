<?php

namespace App\Repositories\Import;

use App\Models\Import;
use App\Models\Inventory;
use Excel;
use App\Imports\ExcelImport;
use Illuminate\Support\Collection;
use App\Services\UploadsExcel;
use App\Services\UploadsZip;
use App\Services\UploadsCode;

class ImportRepository implements ImportRepositoryContract
{
    /**
     * 获取全部采购数据
     *
     * @return import collection
     */
    public function all()
    {
        return Import::with('provider') -> with('exchange') -> with('game') -> where('id' , '>=' , 0) -> orderBy('created_at', 'desc') -> paginate(10);
    }

    /**
     * 采购搜索方法
     *
     * @param [array] $data
     * @return import collection
     */
    public function search($data)
    {
        $imports = Import::with('provider') -> with('exchange') -> with('game') -> where('id' , '>=' , 0) -> orderBy('created_at', 'desc');
        if( isset($data['game_id']) && $data['game_id'] != null){
            $imports = $imports -> where('game_id' , $data['game_id']);
        }
        if( isset($data['start']) && $data['start'] != null && isset($data['end']) && $data['end'] != null){
            $imports = $imports -> whereDate('created_at', '>=' , $data['start']) -> whereDate('created_at', '<=' , $data['end']);
        }
        if( isset($data['status']) && $data['status'] != null){
            $imports = $imports -> where('status' , $data['status']);
        }
        if( isset($data['provider_id']) && $data['provider_id'] != null){
            $imports = $imports -> where('provider_id' , $data['provider_id']);
        }
        return $imports -> paginate(10);
    }

    /**
     * 存储新创建的采购
     *
     * @param array $data
     * @return void
     */
    public function store($data)
    {
        Import::create($data);
    }

    /**
     * 验证是否能够删除采购
     *
     * @param [type] $id
     * @return boolean
     */
    public function canDelete($id)
    {
        $result = Import::findOrFail($id) -> status == config('const.IMPORT_NOT_START');
        return $result;
    }

    /**
     * 删除对应id的采购
     *
     * @param integer $id
     * @return void
     */
    public function destroy($id)
    {
        Import::destroy($id);
    }

    /**
     * 获取对应id的采购
     *
     * @param integer $id
     * @return import model instance
     */
    public function find($id)
    {
        return Import::findOrFail($id);
    }
    
    /**
     * 修改采购数据
     *
     * @param array $data
     * @param integer $id
     * @return void
     */
    public function update($data , $id)
    {
        $import = Import::findOrFail($id);
        $import -> fill($data) -> save();
    }

    /**
     * 存储excel验证码
     *
     * @param array $data
     * @return void
     */
    public function storeExcel($data)
    {
        $excel = new UploadsExcel($data['excel']);
        $codes = $excel -> getCodetoArray();
        $this -> storeExcelData($data , $codes);
    }

    /**
     * 存储照片压缩包
     *
     * @param array $data
     * @return void
     */
    public function storeZip($data)
    {
        $zip = new UploadsZip($data);
        $files = $zip -> storeImage();
        $this -> storeZipData($data , $files);
    }

    public function storeCode($data)
    {        
        $code = new UploadsCode($data);
        $codes = $code -> getCodes();
        $this -> storeCodeData($data , $codes);
    }    

    /**
     * 导入自增加
     *
     * @param integer $id
     * @return void
     */
    protected function importInc(int $id){
        $import = Import::findOrFail($id);
        $import -> importInc();
    }

    /**
     * 存储excel验证码数据
     *
     * @param array $data
     * @param array $codes
     * @return void
     */
    private function storeExcelData($data , $codes)
    {
        foreach($codes as $ele){
            $arr = array('import_id' => $data['import_id'] , 'game_id' => $data['game_id'] , 'type' => config('const.TYPE_CODE') ,
                        'state' => config('const.GAME_CODE_NOT_DEAL') , 'extracter' => ' ' , 'extract_time' => date("Y-m-d H:i:s" , time()),
                        'content' => $ele
                            );
            Inventory::create($arr);
            $this -> importInc( $data['import_id']);
        } 
    }

    /**
     * 存储压缩包照片
     *
     * @param array $data
     * @param array $files
     * @return void
     */
    private function storeZipData($data , $files)
    {
        foreach($files as $file){
            $arr = array('import_id' => $data['import_id'] , 'game_id' => $data['game_id'] , 'type' => config('const.TYPE_IMAGE') ,
                        'state' => config('const.GAME_CODE_NOT_DEAL') , 'extracter' => ' ' , 'extract_time' => date("Y-m-d H:i:s" , time()),
                        'content' => $file );
            Inventory::create($arr);
            $this -> importInc( $data['import_id']);
        } 
    }

    /**
     * 存储excel数据
     *
     * @param [array] $data
     * @param [array] $codes
     * @return void
     */
    private function storeCodeData($data , $codes)
    {
        foreach($codes as $code){
            $arr = array('import_id' => $data['import_id'] , 'game_id' => $data['game_id'] , 'type' => config('const.TYPE_CODE') ,
                        'state' => config('const.GAME_CODE_NOT_DEAL') , 'extracter' => ' ' , 'extract_time' => date("Y-m-d H:i:s" , time()),
                        'content' => $code );
            Inventory::create($arr);
            $this -> importInc( $data['import_id']);
        }
    }

    /**
     * 强行关闭对应id得采购
     *
     * @param integer $id
     * @return void
     */
    public function close(int $id)
    {
        $import = $this -> find($id);
        $import -> status = config('const.IMPORT_CLOSED');
        $import -> save();
    }
}