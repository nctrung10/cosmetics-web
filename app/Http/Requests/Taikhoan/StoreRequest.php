<?php

namespace App\Http\Requests\Taikhoan;

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
            'email' => 'required|email|unique:taikhoan',
            'ten' => 'required',
            'password' => 'required|between:6,20',
            'confirm_matkhau' => 'required|same:password',
        ];
    }
    public function messages()  // custom báo lỗi muốn hiển thị
    {
        return [
            'ten.required' => 'Vui lòng điền tên nhân viên',
            'email.required' => 'Vui lòng điền email',
            'email.unique' => 'Đã tồn tại email này!',
            'email.email' => 'Email nên có dạng example@gmail.com',
            'password.required' => 'Vui lòng điền mật khẩu',
            'password.between' => 'Mật khẩu phải từ 6 đến 20 ký tự',
            'confirm_matkhau.required' => 'Vui lòng nhập lại mật khẩu',
            'confirm_matkhau.same' => 'Nhập lại mật khẩu không chính xác',
        ];
    }
}
