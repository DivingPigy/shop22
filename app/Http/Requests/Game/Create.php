<?php

namespace App\Http\Requests\Game;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Rules\NameUnique;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::user() -> can('游戏');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ["required" , new NameUnique($this -> plateform_id)] ,
            'plateform_id' => 'required',
            'price' => 'required',
            'exchange_id' => 'required',
            'file' => 'required',
            'img' => 'required',
            'description' => 'required'
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
            'name.required' => '游戏名不能为空',
            'plateform_id.required' => '客户不能为空',
            'price.required' => '价格不能为空',
            'exchange_id.required' => '外汇不能为空',
            'file.required' => '封面图片不能为空',
            'img.required' => '图片不能为空',
            'description.required' => '描述不能为空',
        ];
    }
}
