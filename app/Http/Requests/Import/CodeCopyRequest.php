<?php

namespace App\Http\Requests\Import;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\CodeCheck;

class CodeCopyRequest extends FormRequest
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
            "import_id" => ["required" , new CodeCheck($this)] ,
            "game_id" => "required" , 
            'codes' => "required" , 
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
            "codes.required" => "必须粘贴验证码" ,
        ];
    }
}
