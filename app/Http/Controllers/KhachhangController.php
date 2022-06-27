<?php

namespace App\Http\Controllers;

use App\Models\Khachhang;
use Illuminate\Http\Request;
use App\Http\Requests\Khachhang\StoreRequest;
use App\Http\Requests\Khachhang\UpdateRequest;
use App\Models\Donhang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class KhachhangController extends Controller
{

    public function index()
    {
        //
    }

    /* SHOW REGISTER FORM */
    public function create()
    {
        if(auth()->guard('cus')->check()){
            return view('layouts.404');
        }else {
            return view('khachhang.dangky');
        }
    }
    /* SUBMIT REGISTER FORM */
    public function store(StoreRequest $request)
    {
        $mahoapass = bcrypt($request->password);    //Mã hóa mật khẩu
        $request->merge(['password' => $mahoapass]);

        if(Khachhang::create($request->all())){
            return redirect()->route('dangnhap')->with('success','Đăng ký tài khoản thành công !');
        }
    }

    
    public function show(Khachhang $khachhang)
    {
        //
    }


    public function edit()
    {
        if(auth()->guard('cus')->check()){
            $customer = auth()->guard('cus')->user();
            return view('khachhang.thongtinkh')->with('customer', $customer); 
        }else {
            return view('khachhang.dangnhap');
        }
        
    }
    public function update(UpdateRequest $request)
    {
        $customer = auth()->guard('cus')->user();
        $customer->update($request->except('email'));
        return redirect()->back()->with('success','Cập nhật thông tin thành công!');
    }

    public function showchangePass()
    {
        if(auth()->guard('cus')->check()){
            $customer = auth()->guard('cus')->user();
            return view('khachhang.doimatkhau')->with('customer', $customer); 
        }else {
            return view('khachhang.dangnhap');
        }
    }
    public function changePass(Request $request)
    {   
        $request->validate([
            'mkcu' => 'required',
            'mkmoi' => 'required|between:6,20',
            'xacnhanmk' => 'required|same:mkmoi'
        ],[
            'mkcu.required' => 'Vui lòng nhập mật khẩu cũ',
            'mkmoi.required' => 'Vui lòng nhập mật khẩu mới',
            'mkmoi.between' => 'Mật khẩu phải từ 6 đến 20 ký tự',
            'xacnhanmk.required' => 'Vui lòng nhập lại mật khẩu',
            'xacnhanmk.same' => 'Nhập lại mật khẩu mới không chính xác'
        ]);
        $customer = auth()->guard('cus')->user();
        //lấy từ khachhang ra mk hiện tại
        $current_pass = auth()->guard('cus')->user()->getAuthPassword();
        
        //password_verify: giải mã bcrypt
        if(password_verify($request->mkcu, $current_pass)){
            $mahoa = bcrypt($request->mkmoi);
            $request->merge(['password' => $mahoa]);
                
            $customer->update($request->all());
            return redirect()->back()->with('success','Cập nhật mật khẩu thành công!');
        }else {
            return back()->with('error','Mật khẩu cũ không chính xác');
        }
        
        
    }

    public function purchaseHistory()
    {
        if(auth()->guard('cus')->check()){
            $customer = auth()->guard('cus')->user();
            $donhang = Donhang::where('khachhang_id',$customer->id)->orderBy('created_at','DESC')->paginate(3); 
           return view('khachhang.lichsumuahang')->with('customer', $customer)->with('donhang',$donhang); 
        }else {
            return view('khachhang.dangnhap');
        }
    }
    public function cancelOrder(Request $request, $id)
    {
        $customer = auth()->guard('cus')->user();
        $donhang = Donhang::find($id);
        if(empty($request->lydohuy)){
            $lydohuy = '0';
        }else {
            $lydohuy = $request->lydohuy;
        }
        Mail::send('email.cancel-order',[
            'customer' => $customer,
            'lydohuy' => $lydohuy,
            'donhang' => $donhang,

        ], function($mail) use($customer, $donhang, $lydohuy) {
            $mail->to('eden.beautycare99@gmail.com',$customer->ten, $lydohuy, $donhang);  
            $mail->from($customer->email, $customer->sdt, $customer->diachi);  
            $mail->subject('Khách hàng đã hủy đơn hàng #'.$donhang->id.'');
        });
        $donhang->trangthai = 3;
        $donhang->save();
        return redirect()->back()->with('success','Hủy đơn hàng thành công');
    }

    public function destroy(Khachhang $khachhang)
    {
        //
    }
}
