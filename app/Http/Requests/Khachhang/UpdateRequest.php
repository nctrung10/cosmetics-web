<?php

namespace App\Http\Requests\Khachhang;

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
            'ten' => 'required',
            'sdt' => 'required|regex:/^0([0-9\s\-\+\(\)]*)$/|between:10,11|unique:khachhang,sdt,'.request()->id,
            'ngaysinh' => 'nullable|before:today',
            'diachi' => 'required',
        ];
    }
    
    public function messages()   // custom báo lỗi muốn hiển thị
    {
        return [
            'ten.required' => 'Họ tên không được để trống!',
            'sdt.required' => 'Số điện thoại không được để trống!',
            'sdt.unique' => 'Số điện thoại này đã tồn tại!',
            'sdt.regex' => 'Vui lòng nhập số điện thoại đúng định dạng',
            'sdt.between' => 'Số điện thoại phải có 10 hoặc 11 chữ số',
            'ngaysinh.before' => 'Ngày sinh phải là ngày trước ngày hiện tại',
            'diachi.required' => 'Địa chỉ không được để trống!',
            
        ];
    }
}