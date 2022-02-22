<?php

namespace App\Http\Requests\import;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ExcelCheck;
use Illuminate\Support\Facades\Auth;

class ExcelUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() -> can('采购');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "import_id" => ["required" , new ExcelCheck($this)] ,
            "game_id" => "required" , 
            'excel' => 'mimes:xlsx',
        ];
    }

    /**
     * 返回的错误信息
     *
     * @return void
     */
    public function messages()
    {
        return [
            "import_id.required" => "采购号不能为空" ,
            "game_id.required" => "游戏不能为空" ,
            "excel.mimes" => "必须上传excel文件"
        ];
    }
}
