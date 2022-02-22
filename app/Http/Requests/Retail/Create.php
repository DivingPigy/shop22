<?php

namespace App\Http\Requests\Retail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user() -> can('临售');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exchange_id' => 'required',
            'game_id' => 'required',
            'price' => 'required',
            'inventory_id' => 'required',
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
            'inventory_id.required' => '客户不能为空',
            'price.required' => '价格不能为空',
            'exchange_id.required' => '外汇种类不能为空'
        ];
    }
}
