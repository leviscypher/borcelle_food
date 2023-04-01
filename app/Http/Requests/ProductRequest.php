<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:product,name,' . $this->id,
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image_path' => 'required|array',
            'image_path.*' => 'mimes:png,jpg,jpeg,gif,svg|max:2048',
            'description' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' => "không để trống",
            'name.unique' => 'sản phẩm này đã tồn tại',
            'price.required' => "không để trống",
            'price.numeric' => "giá tiền phải là số",
            'quantity.required' => "không để trống",
            'quantity.numeric' => "giá tiền phải là số",
            'image_path.required' => "không để trống",
            'image_path.array' => "trường này phải là định dạng mảng",
            'image_path.*.mimes' => "ảnh phải đúng định dang (png, jpg, jpeg, gif, svg)",
            'image_path.max' => "ảnh không được vượt quá 2048kb",
            'description.required' => 'không để trống',
        ];
    }
}
