<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'quantity' => 'required|numeric|min:1',
            'description' => 'required',
            'categories_id' => 'required'
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
            'quantity.min' => 'số lượng sản phẩm phải lớn hơn 1',
            'description.required' => 'không để trống',
            'categories_id.required' => 'vui lòng chọn danh mục sản phẩm'
        ];
    }
}
