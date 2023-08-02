<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerUserInfoRequest extends FormRequest
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
            'fullname' => 'required',
            'phone' => ['required', 'unique:user_info,phone,' . $this->user_id . ',user_id', 'numeric', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'email' => 'email|unique:user_info,email,' . $this->user_id . ',user_id',
            'birthday' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'không được để trống!',
            'phone.required' => 'không được để trống!',
            'phone.numeric' => 'trường này phải là số!',
            'phone.regex' => 'số điện thoại không đúng!',
            'phone.unique' => 'số điện thoại này đã được sử dụng',
            'email.unique' => 'email này đã được sử dụng',
            'birthday.required' => 'không được để trống',
            'birthday.date' => 'nhập ngày tháng năm sinh',
            'email.unique' => 'email này đã tồn tại',
            'email.email' => 'email không đúng',
        ];
    }
}
