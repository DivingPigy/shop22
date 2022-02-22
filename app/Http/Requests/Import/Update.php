<?php

namespace App\Http\Requests\Import;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Update extends FormRequest
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
            'game_id' => 'required',
            'exchange_id' => 'required',
            'total' => 'required',
            'price' => 'required',
            'provider_id' => 'required' 
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
            'game_id.required' => '游戏名不能为空',
            'exchange_id.required' => '外汇不能为空',
            'total.required' => '总量不能为空',
            'price.required' => '价格不能为空',
            'provider_id.required' => '供货商不能为空'
        ];
    }
}
