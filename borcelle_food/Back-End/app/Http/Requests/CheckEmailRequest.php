<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckEmailRequest extends FormRequest
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
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'vui lòng nhập email đã đăng kí tài khoản để lấy lại mật khẩu.',
            'email.email' => 'dữ liệu vừa nhập không phải email'
        ];
    }
}
