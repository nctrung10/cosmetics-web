<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use App\Models\Banner;
use App\Models\ChitietDonhang;
use App\Models\Danhgia;
use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\DanhmucSanpham;
use App\Models\Khachhang;
use App\Models\Thuonghieu;
use App\Models\Khuyenmai;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
    public function index()
    {
        $banchay = ChitietDonhang::distinct()->get('sanpham_id');   //lay sanpham_id va xoa trung lap
        $data = ChitietDonhang::all();
        $best_seller = Sanpham::all();
        //tao mang lay ra sanpham_id va soluong (da ban)
        $arr = [];
        $y = 0;
        foreach($banchay as $b){
            $i = 0;
            foreach($data as $d){
                if($b->sanpham_id == $d->sanpham_id){
                    $i += $d->soluong;
                }
            }
            $arr[$y] = [
                'sanpham_id' => $b->sanpham_id,
                'soluong' => $i
            ];
            $y++;
        }
        
        $new_product = Sanpham::limit(10)->orderBy('created_at','DESC')->get();
        $may_like = Sanpham::all()->random(5);
        $banner =  Banner::where('trangthai',1)->orderBY('id','ASC')->get();
        $blogs = Baiviet::limit(3)->orderBy('created_at','DESC')->get();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $khuyenmai = Khuyenmai::where('trangthai',1)->where('ngaybatdau','<=',$now)->where('ngayketthuc','>=',$now)->get();
        $danhmucparent = DanhmucSanpham::all();
        return view('khachhang.trangchu', compact('best_seller','new_product','arr','may_like','khuyenmai','danhmucparent','banner','blogs'));
    }

    public function comment(Request $request, $id)
    {
        if(empty(Auth::guard('cus')->check())){
            return redirect()->back()->with('error','Vui lòng đăng nhập để đánh giá');
        }else {

            $kh_id = Auth::guard('cus')->user()->id;
            $sao = 5;
            if($request->rate){ $sao = $request->rate; }

            if(empty($request->binhluan)){
                return redirect()->back()->with('wrong','Vui lòng nhập bình luận cho đánh giá');
            }
            /* $request->validate([
                'binhluan' => 'required',
                ],[
                'binhluan.required' => '*Vui lòng nhập bình luận của bạn',
            ]); */
            if(Danhgia::create([
                'khachhang_id' => $kh_id,
                'sanpham_id' => $id,
                'binhluan' => $request->binhluan,
                'sosao' => $sao,
            ])) {
                return redirect()->back()->with('success','Đánh giá sản phẩm thành công');
            }else {
                return redirect()->back()->with('wrong','Đánh giá sản phẩm không thành công');
            }

        }
    }

    public function contact()
    {
        return view('khachhang.lienhe');
    }
    public function post_contact(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'email' => 'required',
            'sdt' => 'required',
        ],[
            'ten.required' => 'Vui lòng nhập họ tên của bạn',
            'email.required' => 'Vui lòng nhập địa chỉ email',
            'sdt.required' => 'Vui lòng nhập số điện thoại',
        ]);
        Mail::send('email.contact',[
            'ten' => $request->ten,
            'email' => $request->email,
            'sdt' => $request->sdt,
            'noidung' => $request->noidung
        ], function($mail) use($request) {
            $mail->to('eden.beautycare99@gmail.com',$request->ten);  //gui den chu store + ten cua nguoi gui
            $mail->from($request->email, $request->sdt);   //gui tu email nhap vao
            $mail->subject('Liên hệ từ khách hàng - '.$request->ten.'');   //chu de mail
        });
        return redirect()->back()->with('success','Gửi liên hệ thành công');
    }

    
    public function login()
    {
        if(Auth::guard('cus')->check()){
            return view('layouts.404');
        }else {
            return view('khachhang.dangnhap');
        }
    }
    public function post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Vui lòng nhập email hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);

        if(Auth::guard('cus')->attempt($request->only('email','password'),$request->has('remember_token'))){
            return redirect()->route('trangchu')->with('success','Đăng nhập thành công');
        }else {
            return redirect()->back()->with('error','Email hoặc mật khẩu không đúng');
        }
        
    }
    public function logout()
    {
        if(Auth::guard('cus')->check()){
            Auth::guard('cus')->logout();
            return redirect()->route('trangchu');
        }else {
            return view('layouts.404');
        }
        
    }

    public function view($slug) 
    { 
        $danhmuc2 = DanhmucSanpham::where('slug','like',$slug.'%')->first(); //first() trả về đối tượng đầu tiên lấy được

        $danhmucall = DanhmucSanpham::where('slug','like',$slug.'%')->get();  
        $danhmuc3 = DanhmucSanpham::where('slug','like',$slug.'%')->first();
        $sanphamall = Sanpham::all();

        $showsp = Sanpham::where('slug',$slug)->first();
        $showbrand = Thuonghieu::where('slug',$slug)->first();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $khuyenmai = Khuyenmai::where('trangthai',1)->where('ngaybatdau','<=',$now)->where('ngayketthuc','>=',$now)->get();
        
        $danhmucparent = DanhmucSanpham::all(); //lây hết danhmuc để so sánh show khuyenmai cho danhmuc con

        if($showbrand) {
            return view('khachhang.danhmuc',[
                'showbrand'=>$showbrand,
                'khuyenmai'=>$khuyenmai,
                'danhmucparent'=>$danhmucparent
            ]);  

        }else if($danhmucall->count() > 1) {
            return view('khachhang.danhmuc',[
                'danhmucall' => $danhmucall,
                'sanphamall' => $sanphamall,
                'danhmuc3' => $danhmuc3,
                'khuyenmai' => $khuyenmai
            ]);

        }else if($danhmucall->count() == 1) {
            return view('khachhang.danhmuc',[
                'danhmuc2'=>$danhmuc2,
                'khuyenmai'=>$khuyenmai,
                'danhmucparent'=>$danhmucparent
            ]);

        }else if($showsp) {
            $sametype = Sanpham::where('danhmucsp_id',$showsp->danhmucsp_id)->whereNotIn('id',[$showsp->id])->get();
            $danhgiasp = Danhgia::where('sanpham_id',$showsp->id)->orderBY('created_at','DESC')->paginate(4);
            $danhgiaspall = Danhgia::where('sanpham_id',$showsp->id)->get();
            
            return view('khachhang.chitietsanpham',[
                'showsp'=>$showsp,
                'sametype'=>$sametype,
                'danhgiasp'=>$danhgiasp,
                'danhgiaspall'=>$danhgiaspall,
                'khuyenmai'=>$khuyenmai,
                'danhmucparent'=>$danhmucparent
            ]);
        }else {
            return view('layouts.404');
        }
    }

    public function search(Request $request)
    {
        $keywords = $request->key_submit;
        if(empty($keywords)) {
            return view('khachhang.timkiem', compact('keywords'));
        }else {
            $timkiem_sp = Sanpham::where('ten','like','%'.$keywords.'%')->get();
            return view('khachhang.timkiem', compact('timkiem_sp','keywords'));
        }
    }
    public function autocomplete(Request $request)
    {
        $data = $request->all();

        if($data['query']){

            $product = Sanpham::where('ten','like','%'.$data['query'].'%')->get();
            $output = '';

            if($product->count() > 0) {

                foreach ($product as $key => $p) {
                    $output .= '<li class="li-search"><a href="#" class="dropdown-item" 
                    style="display:-webkit-box !important; -webkit-box-orient:vertical; -webkit-line-clamp:1; overflow:hidden;
                    font-size:14px; font-weight:500; color:#0b643b;">'.$p->ten.'</a></li>';
                }
               
            } else {
                $output .= '<li class="li-search"><a href="#" class="dropdown-item">Không tồn tại sản phẩm này.</a></li>';
            }
            echo $output;
        }
    }

    public function recoveryPass(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $customer = Khachhang::where('email',$data['recoveryemail'])->get();
        foreach($customer as $cus){
            $kh_id = $cus->id;
        }

        if($customer){
            $count_cus = $customer->count();
            if($count_cus==0){
                return redirect()->back()->with('error_email','Email chưa được đăng ký để phục hồi mật khẩu');
            }else {
                $token_random = Str::random(60);
                $customer = Khachhang::find($kh_id);
                $customer->remember_token = $token_random;
                $customer->save();

                $to_email = $data['recoveryemail'];
                $link_reset = url('phuc-hoi-mat-khau?email='.$to_email.'&token='.$token_random);
                $data = array(
                    'link' => $link_reset,
                    'email' => $to_email
                );

                Mail::send('email.recover-pass',[
                    'data' => $data
                ], function($mail) use($now, $data) {
                    $mail->to($data['email']);  //gui den email khach hang
                    $mail->from('eden.beautycare99@gmail.com');   //gui tu email store
                    $mail->subject('[Eden Beauty] Yêu cầu phục hồi mật khẩu'.' '.$now);
                });
                
                return redirect()->back()->with('success_email','Vui lòng kiểm tra email của bạn để đặt lại mật khẩu');
            }
        }
               
    }

    public function updatenewPass()
    {
        return view('khachhang.laymatkhau');
    }
    public function post_updatenewPass(Request $request)
    {
        $data = $request->all();

        $token_random = Str::random(60);
        $customer = Khachhang::where('email',$data['email'])->where('remember_token',$data['token'])->get();
        $cus_count = $customer->count();
        
        if($cus_count > 0){
            foreach($customer as $c){
                $kh_id = $c->id;
            }
            $reset = Khachhang::find($kh_id);

            $request->validate([
                'new_password' => 'required|between:6,20'
            ],[
                'new_password.required' => 'Vui lòng nhập mật khẩu',
                'new_password.between' => 'Mật khẩu phải từ 6 đến 20 ký tự'
            ]);
            $mahoapass = bcrypt($data['new_password']); 
            $request->merge(['password' => $mahoapass]);

            $reset->remember_token = $token_random;

            if($reset->update($request->all())){
                return redirect()->route('dangnhap')->with('success','Đặt lại mật khẩu mới thành công');
            }
            
        }else {
            return redirect()->back()->with('error','Vui lòng nhập lại email của bạn');
        }

    }

    public function showBlog()
    {
        $allblog = Baiviet::orderBy('created_at','DESC')->paginate(10);
        return view('khachhang.blog',compact('allblog'));
    }
    public function blogDetail($slug)
    {   
        $blog = Baiviet::where('slug',$slug)->first();
        return view('khachhang.chitietblog',['blog'=>$blog]);
    }


    /* public function cusinfo()
    {
        if(Auth::guard('cus')->check()){
            return view('khachhang.thongtinkh');
        }else {
            return view('layouts.404');
        }
    } */
    /* public function payment()
    {
        if(Auth::guard('cus')->check()){
            return view('khachhang.thanhtoan');
        }else {
            return view('khachhang.dangnhap');
        }
    } */
    /* public function cart()
    {
        return view('khachhang.giohang');
    } */

}