<?php

namespace App\Http\Requests\Order;

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
        return Auth::user() -> can('订单');
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
            'custmer_id' => 'required',
            'total' => 'required',
            'price' => 'required',
            'exchange_id' => 'required' 
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
            'custmer_id.required' => '客户不能为空',
            'total.required' => '总量不能为空',
            'price.required' => '价格不能为空',
            'exchange_id.required' => '外汇种类不能为空'
        ];
    }
}
