<?php

namespace App\Http\Requests\DanhmucSanpham;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'ten' => 'required|unique:danhmucsanpham',
            'slug' => 'required',
        ];
    }
    public function messages()  // custom báo lỗi muốn hiển thị
    {
        return [
            'ten.required' => 'Tên danh mục không được để trống.',
            'ten.unique' => 'Đã tồn tại danh mục này!',
            'slug.required' => 'Slug không được để trống.',
        ];
    }
}
