<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users,username,' . $this->id,
            'password' => 'required|min:8',
            'password_confirmation' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->id,
            'role_id' => 'required|numeric',
            'position_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'nhập tên tài khoản',
            'username.unique' => 'tài khoản đã tồn tại',
            'password.required' => 'nhập mật khẩu',
            'password.min' => 'mật khẩu phải có tối thiểu 8 kí tự',
            'password_confirmation.required' => 'vui lòng nhập lại mật khẩu!',
            'email.required' => 'nhập email',
            'email.unique' => 'email này đã tồn tại',
            'email.email' => 'email không đúng',
            'role_id.required' => 'vui lòng chọn vai trò cho tài khoản',
            'role_id.numeric' => 'vui lòng chọn đúng vai trò đã cho',
            'position_id.required' => 'vui lòng chọn chức vụ cho tài khoản',
            'position_id.numeric' => 'vui lòng chọn đúng chức vụ đã cho',
        ];
    }
}
