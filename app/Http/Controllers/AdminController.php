<?php

namespace App\Http\Controllers;

use App\Models\Donhang;
use App\Models\Sanpham;
use App\Models\Thongke;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard()
    {
        $product_count = Sanpham::count();  //đếm tổng sp
        $sales_count = Thongke::sum('doanhthu');
        $new_order = Donhang::where('trangthai',1)->count();
        

        //xử lý thông báo hết hsd trước 2 tháng
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $allpro = Sanpham::all();

        $ngayht = $now->day;
        $thanght = $now->month;
        $namht = $now->year;
        
        for($i=1; $i<=$thanght; $i++){
            if($i != $thanght) {
                if($i == 2){
                    $ngayht += 29;
                }elseif($i == 4 || $i == 6 || $i == 9 || $i == 11){
                    $ngayht += 30;
                }else {
                    $ngayht += 31;
                }
            }else {
                $ngayht += 0;
            }
        }

        $exp_product = [];
        $b = 0;
        foreach($allpro as $a){
            $y = substr($a->hsd,0,4);
            $m = substr($a->hsd,5,2);
            $d = substr($a->hsd,8,2);

            for($i = 1; $i <= $m; $i++){
                if($i != $m) {
                    if($i == 2){
                        $d += 29;
                    }elseif($i == 4 || $i == 6 || $i == 9 || $i == 11){
                        $d += 30;
                    }else {
                        $d += 31;
                    }
                }else {
                    $d += 0;
                }
            }
            //so sánh nếu qua 1 năm mới
            if((int)$y - (int)$namht == 1) {
                if(366 - $ngayht + $d <= 61) {
                    $exp_product[$b] = [
                        'id' => $a->id,
                        'hsd' => $a->hsd,
                    ];
                    $b++;
                }
            }elseif((int)$y - (int)$namht == 0) {
                if($d - $ngayht <= 61){
                    $exp_product[$b] = [
                        'id' => $a->id,
                        'hsd' => $a->hsd,
                    ];
                    $b++;
                }
            }
        }
        
        return view('admin.dashboard',compact('product_count','sales_count','new_order','exp_product'));
    }
    
    public function file()
    {
        return view('admin.file');
    }
    
    public function logout()
    {
        if(Auth::guard('taikhoan')->check()){
            Auth::guard('taikhoan')->logout();
            return redirect()->route('login');
        }else {
            return redirect()->route('login');
        }
    }

    public function login()
    {
        if(Auth::guard('taikhoan')->check()){
            return view('admin.404');
        }else {
            return view('admin.login');
        }
    }
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
        ]);
        
        //thực hiện login
        if(Auth::guard('taikhoan')->attempt($request->only('email','password'))) {
            return redirect()->route('admin.dashboard');
        }else{
            return redirect()->back()->with('error','Email hoặc mật khẩu không chính xác');
        }
    }

    public function showDays()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
        /* $tuanqua = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString(); */
        $show30d = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(1)->toDateString();

        $get = Thongke::whereBetween('ngaydathang',[$show30d,$now])->orderBy('ngaydathang','ASC')->get();
        foreach($get as $val)
        {
            $chart_data[] = array(
                'period' => $val->ngaydathang,
                'sales' => $val->doanhthu,
                'profit' => $val->loinhuan
            );
        }
        echo $data = json_encode($chart_data);
        
    }

    public function filterbyTimeline(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString(); //hàm todatestring: format datetime theo dung du lieu trong csdl

        $tuanqua = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();    //hàm sub: trừ đi
        $namqua = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString(); 
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString(); 
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        if($data['dashboard_value'] == '1tuan'){
            $get = Thongke::whereBetween('ngaydathang',[$tuanqua,$now])->orderBy('ngaydathang','ASC')->get();
        }elseif($data['dashboard_value'] == 'thangnay'){
            $get = Thongke::whereBetween('ngaydathang',[$dauthangnay,$now])->orderBy('ngaydathang','ASC')->get();
        }elseif($data['dashboard_value'] == 'thangtruoc'){
            $get = Thongke::whereBetween('ngaydathang',[$dauthangtruoc,$cuoithangtruoc])->orderBy('ngaydathang','ASC')->get();
        }else {
            $get = Thongke::whereBetween('ngaydathang',[$namqua,$now])->orderBy('ngaydathang','ASC')->get();
        }

        foreach($get as $val)
        {
            $chart_data[] = array(
                'period' => $val->ngaydathang,
                'sales' => $val->doanhthu,
                'profit' => $val->loinhuan
            );
        }
        echo $data = json_encode($chart_data);

    }

    public function filterbyDate(Request $request)
    {
        $data = $request->all();
        
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $get = Thongke::whereBetween('ngaydathang',[$from_date,$to_date])->orderBy('ngaydathang','ASC')->get();

        foreach($get as $key => $val)
        {
            $chart_data[] = array(
                'period' => $val->ngaydathang,
                'sales' => $val->doanhthu,
                'profit' => $val->loinhuan
            );
        }
        echo $data = json_encode($chart_data);
    }

}
