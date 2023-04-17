<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'phone' => ['required', 'regex:/((09|03|07|08|05)+([0-9]{8})\b)/'],
            'delivery_address' => 'required',
            'city_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'nhập họ tên người nhận.',
            'phone.required' => 'số điện thoại người nhận.',
            'phone.regex' => 'số điện thoại không chính xác.',
            'delivery_address.required' => 'thêm địa chỉ nhận hàng.',
            'city.required' => 'chọn thành phố.',
            'district.required' => 'chọn quận, huyện.',
            'ward.required' => 'chọn xã, phường'
        ];
    }
}
