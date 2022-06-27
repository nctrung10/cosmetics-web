<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use App\Models\ChitietDonhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\CartHelper;
use App\Models\Giamgia;
use App\Models\HinhthucThanhtoan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ThanhtoanController extends Controller
{
    /* public function __construct()
    {
        $this->middleware('cus');
    } */

    public function form()
    {
        if(empty(auth()->guard('cus')->check()) && session('cart')) {
            return redirect()->route('cart.view')->with('error','Bạn cần đăng nhập để mua hàng');
        }else if(auth()->guard('cus')->check() && session('cart')) {
            $paymethod = HinhthucThanhtoan::where('trangthai',1)->get();
            return view('khachhang.thanhtoan', compact('paymethod'));
        }else {
            return view('layouts.404');
        }
    }
    
    public function submit_form(Request $request, CartHelper $cart)
    {
        $kh_id = Auth::guard('cus')->user()->id;
        $kh_email = Auth::guard('cus')->user()->email;
        $kh_ten = Auth::guard('cus')->user()->ten;
        $kh_sdt = Auth::guard('cus')->user()->sdt;
        $kh_diachi = Auth::guard('cus')->user()->diachi;
        $tongtien = $request->tonggia - $request->voucher + $request->ship;
        
        if($request->httt_id == 1){

            if(Session::has('voucher')){
                $ma_gg = Session::get('voucher')[0]['ma_gg'];
                $data = Giamgia::where('ma_gg', $ma_gg)->first();
                $data->soluong --;
                $data->save();
                Session::forget('voucher');
            }
            
            if($donhang = Donhang::create([
                'khachhang_id' => $kh_id,
                'httt_id' => $request->httt_id,
                'gia_giam' => $request->voucher,
                'phivanchuyen' => $request->ship,
                'tongtien' => $tongtien,
                'tenKH' => $request->tenKH,
                'sdt' => $request->sdt,
                'email' => $request->email,
                'diachi' => $request->diachi,
                'chuthich' => $request->chuthich,
                'ngaydathang' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d'),
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
            ])) {
                $donhang_id = $donhang->id;

                foreach($cart->items as $product_id => $item) {
                    $quantity = $item['quantity'];
                    $tonggia = $item['gia'] * $item['quantity'];

                    ChitietDonhang::create([
                        'donhang_id' => $donhang_id,
                        'sanpham_id' => $product_id,
                        'soluong' => $quantity,
                        'tonggia' => $tonggia
                    ]);
                }
                Mail::send('email.order',[
                    'donhang' => $donhang,
                    'items' => $cart->items,
                    'kh_ten' => $kh_ten,
                    'kh_email' => $kh_email,
                    'kh_sdt' => $kh_sdt,
                    'kh_diachi' => $kh_diachi,

                ], function($mail) use($donhang, $kh_email, $kh_ten, $kh_sdt, $kh_diachi) {
                    $mail->to($kh_email, $kh_ten, $kh_sdt, $kh_diachi);  //gui den email khach hang
                    $mail->from('eden.beautycare99@gmail.com');   //gui tu email store
                    $mail->subject('Thông báo xác nhận đơn hàng #'.$donhang->id.'');
                });
                
                session(['cart' => '']);
                return redirect()->route('trangchu')->with('success_order','Đặt hàng thành công');
            }else {
                return redirect()->back()->with('error','Đặt hàng không thành công');
            }
        //xử lý VNPAY
        }else if($request->httt_id == 2) {
            $donhang = new Donhang();
            $donhang->khachhang_id = $kh_id;
            $donhang->httt_id = $request->httt_id;
            $donhang->gia_giam = $request->voucher;
            $donhang->phivanchuyen = $request->ship;
            $donhang->tongtien = $tongtien;
            $donhang->tenKH = $request->tenKH;
            $donhang->sdt = $request->sdt;
            $donhang->email = $request->email;
            $donhang->diachi = $request->diachi;
            $donhang->chuthich = $request->chuthich;
            $donhang->ngaydathang = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $donhang->created_at = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');

            Session::put('donhang',$donhang);
            session(['cus' => $kh_id]);

            return view('khachhang.vnpayindex', compact('tongtien'));
        }else {
            return back()->with('error','Vui lòng chọn hình thức thanh toán');
        }

    }
    


}
