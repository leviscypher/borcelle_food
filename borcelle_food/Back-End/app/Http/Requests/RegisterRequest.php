<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:8',
            'email' => 'required|unique:users,email|email',
            'password_confirmation' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => 'nhập tên tài khoản',
            'username.unique' => 'tài khoản đã tồn tại',
            'password.required' => 'nhập mật khẩu',
            'password.min' => 'nhập mật có tối thiểu 8 kí tự',
            'password.confirmed' => 'nhập lại mật khẩu không đúng',
            'password_confirmation.required' => 'vui lòng nhập lại mật khẩu!',
            'email.required' => 'nhập email của bạn',
            'email.unique' => 'email này đã tồn tại',
            'email.email' => 'email không hợp lệ'
        ];
    }
}
