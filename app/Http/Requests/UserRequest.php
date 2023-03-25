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
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'nhập tên tài khoản',
            'username.unique' => 'tài khoản đã tồn tại',
            'password.required' => 'nhập mật khẩu',
            'password.confirmed' => 'nhập lại mật khẩu không đúng',
            'password_confirmation.required' => 'vui lòng nhập lại mật khẩu!',
        ];
    }
}
