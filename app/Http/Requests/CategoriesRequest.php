<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name' => 'required|unique:categories'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'vui lòng nhập trường này!',
            'name.unique' => 'danh mục này đã tồn tại!',
        ];
    }
}
