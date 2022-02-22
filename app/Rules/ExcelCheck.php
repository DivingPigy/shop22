<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\UploadsExcel;
use App\Models\Import;

class ExcelCheck implements Rule
{
    protected $request;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this -> request = $request;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $excel = new UploadsExcel($this -> request -> excel);
        $count = count($excel -> getCodetoArray());
        
        $import = Import::findOrFail($this -> request -> import_id);
        $remains = $import -> total - $import -> imported;

        return $remains >= $count;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '上传的excel验证码超过了剩余的数量';
    }
}
