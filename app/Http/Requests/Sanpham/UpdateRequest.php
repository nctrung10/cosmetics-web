<?php

namespace App\Http\Requests\Sanpham;

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
    public function rules()     // Điều kiện cần để submit form, (lấy name="" trên các input)
    {
        return [
            'ten' => 'required|unique:sanpham,ten,'.request()->id,   //unique tên nhưng trừ id hiện tại của đối tượng
            /* 'danhmucsp_id' => 'required', */
            'hinhanh' => 'required',             
            'mota' => 'required',
            'soluong' => 'required',
            'gia' => 'required',
            'gia_ban' => 'required',
            'nsx' => 'required',
            'hsd' => 'required|after:today'
        ];
    }

    public function messages()   // Custom báo lỗi muốn hiển thị
    {
        return [
            'ten.required' => 'Vui lòng nhập tên sản phẩm',
            'ten.unique' => 'Đã tồn tại sản phẩm này!',
            /* 'danhmucsp_id.required' => 'Vui lòng chọn danh mục sản phẩm', */
            'hinhanh.required' => 'Vui lòng chọn hình ảnh cho sản phẩm',
            'mota.required' => 'Vui lòng nhập mô tả',
            'soluong.required' => 'Vui lòng nhập số lượng',
            'gia.required' => 'Vui lòng nhập giá',
            'gia_ban.required' => 'Vui lòng nhập giá bán',
            'nsx.required' => 'Vui lòng nhập ngày sản xuất',
            'hsd.required' => 'Vui lòng nhập hạn sử dụng',
            'hsd.after' => 'Hạn sử dụng phải sau ngày hôm nay',
        ];
    }
}