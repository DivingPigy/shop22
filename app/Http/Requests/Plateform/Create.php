<?php

namespace App\Http\Requests\Plateform;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class Create extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::user() -> can('平台');
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
            'name.required' => '平台名不能为空',
        ];
    }
}
