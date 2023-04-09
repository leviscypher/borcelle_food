<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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

    public function rules()
    {
        return [
            'password' => 'required',
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'nhập mật khẩu mới.',
            'password_confirmation.required' => 'nhập lại mật khẩu không chính xác',
        ];
    }
}
