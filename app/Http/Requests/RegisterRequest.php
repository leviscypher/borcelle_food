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
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
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
            'password.confirmed' => 'nhập lại mật khẩu không đúng',
            'password_confirmation.required' => 'vui lòng nhập lại mật khẩu!',
            'avatar.image' => 'phải là ảnh!',
            'avatar.mimes' => 'định dạng ảnh gồm (png, jpg, jpeg, gif, svg)',
            'avatar.max' => 'ảnh quá lớn (không vượt quá 2048KB)'
        ];
    }
}