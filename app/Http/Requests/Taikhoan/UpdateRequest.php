<?php

namespace App\Http\Requests\Taikhoan;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;            //cho phép truy cập (true)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()     // điều kiện cần để submit form
    {
        return [
            'ten' => 'required|unique:danhmucsanpham,ten,'.request()->id,   //unique tên nhưng trừ id hiện tại của đối tượng
            'sapxep' => 'required'
        ];
    }
 
    public function messages()   // custom báo lỗi muốn hiển thị
    {
        return [
            'ten.required' => 'Tên danh mục không được để trống!',
            'sapxep.required' => 'Thứ tự ưu tiên không được để trống!',
            'ten.unique' => 'Đã tồn tại danh mục này!',
        ];
    }
}