<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Donhang;
use App\Models\Sanpham;
use App\Models\Giamgia;
use App\Models\ChitietDonhang;
use App\Models\Khuyenmai;
use App\Models\Payment;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function view()
    {
        $item = Sanpham::all();
        return view('khachhang.giohang', compact('item'));
    }

    public function add(CartHelper $cart, $id)
    {
        $product = Sanpham::find($id);
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $khuyenmai = Khuyenmai::where('danhmucsp_id',$product->danhmucsp_id)->where('trangthai','=',1)->where('ngaybatdau','<=',$now)->where('ngayketthuc','>=',$now)->get();
        
        $i = 0;
        foreach ($khuyenmai as $km) {
            $i += $km->giatri;
        }
        $discount_price = $product->gia_ban - $product->gia_ban*$i/100;
        
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->add($product, $quantity, $discount_price);

        return redirect()->back()->with('success','Thêm vào giỏ hàng thành công');
        /* return view('cart.view'); */
    }

    public function update(CartHelper $cart, $id)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    /* Update Cart AJAX */
    public function updateAll(Request $request, CartHelper $cart)
    {
        foreach($request->data as $item){
            $cart->update($item['key'], $item['value']);
        }
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }

    public function clear(CartHelper $cart)
    {
        $cart->clear();
        if(Session::has('voucher')){
            Session::forget('voucher');
        }
        return redirect()->back();
    }

    public function useVoucher(Request $request)
    {
        $data = $request->all();
        $voucher = Giamgia::where('ma_gg',$data['ma_gg'])->first();
        
        if($voucher){
            if($voucher->soluong > 0 && $voucher->ngayketthuc > Carbon::today()->format('Y-m-d')) {
                $voucher_session = Session::get('voucher');
                if($voucher_session == true){
                    //neu voucher nay ton tai thi thuc hien
                    $exist = 0; 
                    if($exist == 0){
                        $cou[] = array(
                            'ma_gg' => $voucher->ma_gg,
                            'hinhthuc' => $voucher->hinhthuc,
                            'giatri' => $voucher->giatri,
                            'soluong' => $voucher->soluong
                        );
                        Session::put('voucher',$cou);
                    }
                }else{
                    $cou[] = array(
                        'ma_gg' => $voucher->ma_gg,
                        'hinhthuc' => $voucher->hinhthuc,
                        'giatri' => $voucher->giatri,
                        'soluong' => $voucher->soluong
                    );
                    Session::put('voucher',$cou);
                }
                Session::save();
                return redirect()->back()->with('success','Áp dụng mã giảm giá thành công');
            }else {
                return redirect()->back()->with('wrong','Mã giảm giá đã hết');
            }

        }else {
            return redirect()->back()->with('wrong','Mã giảm giá không tồn tại');
        }
    }
    public function delVoucher()
    {
        $voucher_session = Session::get('voucher');
        if($voucher_session==true){
            Session::forget('voucher');
            return redirect()->back()->with('success','Xóa mã giảm giá thành công');
        }
    }

    /* POST Thanh toán VNPAY */
    public function createPayment(Request $request, CartHelper $cart)
    {
        $vnp_TxnRef = $cart->randString(15); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = $request->order_desc;
        $vnp_OrderType = $request->order_type;
        $vnp_Amount = str_replace(',', '', $request->amount) * 100;
        $vnp_Locale = $request->language;
        $vnp_BankCode = $request->bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => env('VNP_TMN_CODE'),
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => route('vnpay.return'),
            "vnp_TxnRef" => $vnp_TxnRef,

        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = env('VNP_URL') . "?" . $query;
        if (env('VNP_HASH_SECRET')) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', env('VNP_HASH_SECRET') . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array(
            'code' => '00', 'message' => 'success', 'data' => $vnp_Url
        );
        echo json_encode($returnData);
        return redirect($vnp_Url);
    }

    public function vnpayReturn(Request $request, CartHelper $cart)
    {
        if ($request->session()->has('donhang') && $request->vnp_ResponseCode == '00') {
            
            $vnp_data = $request->all();
            Session::put('vnp_data', $vnp_data);
            return view('khachhang.vnpayreturn', compact('vnp_data'));

        }else {
            Session::forget('donhang');
            return redirect()->route('cart.view')->with('error_vnp','Đã xảy ra sự cố trong quá trình thanh toán');
        }
    }

    public function vnpaySuccess(CartHelper $cart)
    {
        $kh_email = Auth::guard('cus')->user()->email;
        $kh_ten = Auth::guard('cus')->user()->ten;
        $kh_sdt = Auth::guard('cus')->user()->sdt;
        $kh_diachi = Auth::guard('cus')->user()->diachi;

        $donhang = new Donhang();
        $donhang = session('donhang');
        $donhang->save();
        $donhang_id = $donhang->id;
        
        foreach ($cart->items as $product_id => $item) {
            $quantity = $item['quantity'];
            $tonggia = $item['gia'] * $item['quantity'];

            ChitietDonhang::create([
                'donhang_id' => $donhang_id,
                'sanpham_id' => $product_id,
                'soluong' => $quantity,
                'tonggia' => $tonggia
            ]);
        }
        $vnp_data = session('vnp_data');
        Payment::create([
            'donhang_id' => $donhang_id,
            'p_transaction_id' => $vnp_data['vnp_TxnRef'],
            'p_money' => $donhang->tongtien,
            'p_note' => $vnp_data['vnp_OrderInfo'],
            'p_vnp_reponse_code' => $vnp_data['vnp_ResponseCode'],
            'p_code_vnpay' => $vnp_data['vnp_TransactionNo'],
            'p_code_bank' => $vnp_data['vnp_BankCode'],
            'p_time' => date('Y-m-d H:i', strtotime($vnp_data['vnp_PayDate']))
        ]);
        if(Session::has('voucher')) {
            $ma_gg = Session::get('voucher')[0]['ma_gg'];
            $data = Giamgia::where('ma_gg', $ma_gg)->first();
            $data->soluong--;
            $data->save();
            Session::forget('voucher');
        }
        Mail::send('email.order', [
            'donhang' => $donhang,
            'items' => $cart->items,
            'kh_ten' => $kh_ten,
            'kh_email' => $kh_email,
            'kh_sdt' => $kh_sdt,
            'kh_diachi' => $kh_diachi,

        ], function ($mail) use ($donhang, $kh_email, $kh_ten, $kh_sdt, $kh_diachi) {
            $mail->to($kh_email, $kh_ten, $kh_sdt, $kh_diachi);  //gui den email khach hang
            $mail->from('eden.beautycare99@gmail.com');   //gui tu email store
            $mail->subject('Thông báo xác nhận đơn hàng #' . $donhang->id . '');
        });

        session(['cart' => '']);
        Session::forget('donhang');
        Session::forget('vnp_data');
        
        return redirect()->route('trangchu')->with('success_order', 'Đặt hàng thành công');
    }

}
