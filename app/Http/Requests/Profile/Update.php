<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'password_origin' => ['required'],
            'password_new' => 'required',
            'password_new_confirmation' => 'required|same:password_new',
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
            'password_origin.required' => '原密码不能为空',
            'password_new.required' => '新密码不能为空',
            'password_new_confirmation.required' => '新重复的密码不能为空',
            'password_new_confirmation.same' => '新密码两次不一致',
        ];
    }
}
