<?php

namespace App\Http\Requests\Khachhang;

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
            'email' => 'required|email|unique:khachhang',
            'ten' => 'required',
            'sdt' => 'required|regex:/^0([0-9\s\-\+\(\)]*)$/|between:10,11|unique:khachhang',
            'diachi' => 'required',
            'password' => 'required|between:6,20',
            'confirm_matkhau' => 'required|same:password',
        ];
    }
    public function messages()  // custom báo lỗi muốn hiển thị
    {
        return [
            'email.required' => 'Vui lòng điền email',
            'email.unique' => 'Đã tồn tại email này!',
            'email.email' => 'Email nên có dạng example@gmail.com',
            'ten.required' => 'Vui lòng điền họ tên',
            'sdt.required' => 'Vui lòng điền số điện thoại',
            'sdt.regex' => 'Vui lòng nhập số điện thoại đúng định dạng',
            'sdt.between' => 'Số điện thoại phải có 10 hoặc 11 chữ số',
            'sdt.unique' => 'Số điện thoại này đã được sử dụng!',
            'diachi.required' => 'Vui lòng điền địa chỉ',
            'password.required' => 'Vui lòng điền mật khẩu',
            'password.between' => 'Mật khẩu phải từ 6 đến 20 ký tự',
            'confirm_matkhau.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_matkhau.same' => 'Nhập lại mật khẩu không chính xác',
        ];
    }
}
