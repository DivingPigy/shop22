<?php
namespace App\Services;

use App\Imports\ExcelImport;
use Illuminate\Support\Collection;
use Excel;

class UploadsExcel{
    protected $file;

    public function __construct($file)
    {
        $this -> file = $file;
    }

    /**
     * excel解析之后，会包含sheet分页和所有的列,这儿取出第一页
     *
     * @return array excel解析的多维数组
     */
    public function getCodetoArray(){
        $codes = Excel::toArray(new ExcelImport, $this -> file);
        $codes = $this -> firstSheet($codes);
        $codes = $this -> firstCol($codes);
        return $codes;
    }
    /**
     * excel解析之后，会包含sheet分页和所有的列,这儿取出第一页
     *
     * @param [array] $arr
     * @return array
     */
    protected function firstSheet($arr){
        return $arr[0];
    }

    /**
     * excel解析之后，会包含sheet分页和所有的列,这儿取出第一列
     *
     * @param [array] $codes
     * @return collection
     */
    protected function firstCol($codes)
    {
        $collection = new Collection();
        foreach($codes as $code){
            $collection->push($code[0]);
        }
        return $collection;
    }
}