<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckTokenRequest extends FormRequest
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
            'token' => 'required|numeric|min:6'
        ];
    }

    public function messages()
    {
        return [
            'token.min' => 'tối đa 6 số.',
            'token.required' => 'vui lòng nhập mã xác minh.',
            'token.numeric' => 'mã xác minh gồm 6 số.'
        ];
    }
}
