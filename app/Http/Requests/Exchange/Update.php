<?php

namespace App\Http\Requests\Exchange;

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
        // return Auth::user() -> can('外汇');
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
            'name' => 'required',
            'symbol' => 'required',
            // 'rate' => 'required|integer',
        ];
    }

    /**
     * 返回的错误信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '外汇名称不能为空',
            'symbol.required' => '外汇符号不能为空',
            // 'rate.required' => '汇率不能为空',
            // 'rate.integer' => '汇率必须是整数',
        ];
    }
}
