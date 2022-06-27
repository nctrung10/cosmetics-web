<?php

namespace App\Http\Controllers;

use App\Models\ChitietDonhang;
use App\Models\Donhang;
use App\Models\Sanpham;
use Illuminate\Http\Request;
use App\Models\Thongke;
use Illuminate\Support\Carbon;
use PDF;

class DonhangController extends Controller
{
    
    public function index()
    {
        $all_order = Donhang::orderBY('trangthai','ASC')->search()->get();

        $date_from = request()->date_from;
        $date_to = request()->date_to;
        if($date_from && $date_to) {
            $all_order = Donhang::whereBetween('ngaydathang',[$date_from, $date_to])->orderBy('ngaydathang','ASC')->get();
        }
        return view('admin.donhang.index', compact('all_order'));
    }

    
    public function show(Donhang $donhang)
    {
        //
    }

    /**
     * 
     * View order detail & update status
     * 
    */
    public function edit(Donhang $donhang)
    {
        $tamtinh = 0;
        foreach($donhang->details as $data) {
            $tamtinh += $data->tonggia;
        }
        $tatcasanpham = Sanpham::all();
        return view('admin.donhang.edit', compact('donhang','tamtinh','tatcasanpham'));
    }

    public function update(Request $request, Donhang $donhang)
    {
        $donhang->update($request->only('trangthai'));
        $ctdh = ChitietDonhang::where('donhang_id',$donhang->id)->get();
        $tatcasanpham = Sanpham::all();
        //donhang = da xac nhan thi moi tru soluong
        if($request->trangthai == 2){
            foreach($ctdh as $ct){
                foreach($tatcasanpham as $tcsp){
                    if($ct->sanpham_id == $tcsp->id){
                        $tcsp->soluong -= $ct->soluong;
                        $tcsp->save();
                    }
                }
            }
        }

        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $thongke = Thongke::where('ngaydathang',$now)->first();

        //update du lieu qua thongke neu trangthai donhang = da xac nhan
        if($request->trangthai == 2){
            if($thongke) {
                $thongke->doanhthu += $donhang->tongtien;
                $thongke->loinhuan += $donhang->tongtien*30/100; //lợi nhuận = 30% doanh thu
                $thongke->save();
            }else {
                $thongke_new = new Thongke();
                $thongke_new->doanhthu = $donhang->tongtien;
                $thongke_new->loinhuan = $donhang->tongtien*30/100;
                $thongke_new->ngaydathang = $now;
                $thongke_new->save();
            }
        }
        //for test - update theo time luc dat hang
            /* $now = Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
            $date = substr($donhang->created_at, 0, 10);
            $thongke = Thongke::where('ngaydathang', $date)->first();

            if ($request->trangthai == 2) {
                if ($thongke) {
                    $thongke->loinhuan += $donhang->tongtien * 30 / 100;
                    $thongke->doanhthu += $donhang->tongtien;
                    $thongke->save();
                } else {
                    $thongke_new = new Thongke();
                    $thongke_new->loinhuan = $donhang->tongtien * 30 / 100;
                    $thongke_new->doanhthu = $donhang->tongtien;
                    $thongke_new->ngaydathang = $date;
                    $thongke_new->save();
                }
            } */

        return redirect()->back()->with('success','Trạng thái đơn hàng đã được cập nhật');
    }
    
    /* Print Invoice */
    public function showInvoice($order_code)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printPdf($order_code));
        return $pdf->stream();
    }
    public function printPdf($order_code)
    {
        $donhang = Donhang::find($order_code);
        $tamtinh = 0;
        foreach($donhang->details as $data) {
            $tamtinh += $data->tonggia;
        }
        $tatcasanpham = Sanpham::all();
        return view('admin.donhang.invoice', compact('donhang','tamtinh','tatcasanpham'));
    }
    

    public function destroy(Donhang $donhang)
    {
        //
    }
}
