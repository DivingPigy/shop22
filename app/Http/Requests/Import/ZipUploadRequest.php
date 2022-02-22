<?php

namespace App\Http\Requests\Import;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ZipCheck;
use Illuminate\Support\Facades\Auth;

class ZipUploadRequest extends FormRequest
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
            "import_id" => ["required" , new ZipCheck($this)] ,
            "game_id" => "required" , 
            'zip' => ['mimes:zip,rar'],
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
            "zip.mimes" => "必须上传压缩文件格式" ,
        ];
    }
}
