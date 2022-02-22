<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Services\UploadsCode;
use App\Models\Import;

class CodeCheck implements Rule
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
        $codes = new UploadsCode($this -> request -> all());
        $count = count($codes -> getCodes());

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
        return '粘贴的验证码超过了剩余上传数量';
    }
}
