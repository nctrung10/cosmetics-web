<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\DanhmucSanpham;
use App\Http\Requests\Sanpham\StoreRequest;    /* Hàm StoreRequest tạo validation cho form thêm sản phẩm */
use App\Http\Requests\Sanpham\UpdateRequest;   /* Hàm UpdateRequest tạo validation cho form cập nhật sản phẩm */
use App\Models\BiendongGia;
use App\Models\Thuonghieu;
use App\Models\Xuatxu;
use Carbon\Carbon;

class SanphamController extends Controller
{
    
    public function index()     
    {
        $product = Sanpham::orderBY('created_at','DESC')->search()->paginate(10);
        return view('admin.sanpham.index', compact('product'));
    }

    //san pham gan/da het (soluong)
    public function warningProduct()     
    {
        $product = Sanpham::where('soluong','<=',10)->orderBY('soluong','ASC')->search()->paginate(10);
        return view('admin.sanpham.warning', compact('product'));
    }

    //show san pham sap het hsd
    public function expProduct()
    {
        $now = Carbon::now('Asia/Ho_Chi_Minh');
        $allpro = Sanpham::orderBy('hsd','DESC')->search()->get();

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
                        'ngayconlai' => 366-$ngayht+$d,
                    ];
                    $b++;
                }
            }elseif((int)$y - (int)$namht == 0) {
                if($d - $ngayht <= 61){
                    $exp_product[$b] = [
                        'id' => $a->id,
                        'hsd' => $a->hsd,
                        'ngayconlai' => $d-$ngayht,
                    ];
                    $b++;
                }
            }
        }
        
        return view('admin.sanpham.expire',compact('allpro','exp_product'));
    }


    /** 
     *
     * Hiển thị form thêm mới
     * 
    **/
    public function create()    
    {
        $selectCat = DanhmucSanpham::orderBY('ten','ASC')->get();   //(select * xếp theo tên) cho hàm đề quy danh mục
        $selectBrand = Thuonghieu::orderBY('ten','ASC')->get();
        $selectOrgini = Xuatxu::orderBY('ten','ASC')->get();
        return view('admin.sanpham.create', compact('selectCat','selectBrand','selectOrgini'));
    }
 
    public function store(StoreRequest $request)     /* submit form thêm mới */
    {   
        /* upload và tùy biến tên ảnh THÔNG THƯỜNG */
        /* if($request->has('upload_img')){
            $file = $request->upload_img;
            $ext = $request->upload_img->extension();   //lấy đuôi file ảnh
            $file_name = time().'-'.'sanpham.'.$ext;     //định dạng tên cho ảnh được upload lên hệ thống
            $file->move(public_path('uploads'), $file_name);   //di chuyển file ảnh đến thư mục 'uploads' + nối tên file
            }
            $request->merge(['hinhanh' => $file_name]);    //yêu cầu show tên file thay vì đường dẫn  
        */

        //hàm giúp chỉ lọc ra kiểu int
        $gia_nhap = filter_var($request->gia, FILTER_SANITIZE_NUMBER_INT);
        $gia_ban = filter_var($request->gia_ban, FILTER_SANITIZE_NUMBER_INT);
        
        if($sanpham = Sanpham::create([
            'danhmucsp_id' => $request->danhmucsp_id,
            'thuonghieu_id' => $request->thuonghieu_id,
            'xuatxu_id' => $request->xuatxu_id,
            'ten' => $request->ten,
            'slug' => $request->slug,
            'hinhanh' => $request->hinhanh,
            'image_list' => $request->image_list,
            'soluong' => $request->soluong,
            'gia' => $gia_nhap,
            'gia_ban' => $gia_ban,
            'mota' => $request->mota,
            'mota_ngan' => $request->mota_ngan,
            'nsx' => $request->nsx,
            'hsd' => $request->hsd
        ])){
            $sanpham_id = $sanpham->id;

            BiendongGia::create([
                'sanpham_id' => $sanpham_id,
                'sanpham_gia' => $gia_ban,
                'ngaycapnhat' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
            ]);

            return redirect()->route('sanpham.index')->with('success','Thêm sản phẩm thành công');
        }
    }


    /* 
    *
    * Hiển thị form xem chi tiết
    *
    */
    public function show(Sanpham $sanpham)      
    {
        return view('admin.sanpham.show', compact('sanpham'));
    }

    
    /* 
    *
    * Hiển thị form cập nhật 
    *
    */
    public function edit(Sanpham $sanpham)     
    {   
        $selectCat = DanhmucSanpham::orderBY('ten','ASC')->select('id','ten')->get();   //hiện lại danh mục cho <select>
        $selectBrand = Thuonghieu::orderBY('ten','ASC')->select('id','ten')->get();
        $selectOrgini = Xuatxu::orderBY('ten','ASC')->select('id','ten')->get();
        return view('admin.sanpham.edit', compact('sanpham','selectCat','selectBrand','selectOrgini'));
    }
    /* Submit form cập nhật */
    public function update(UpdateRequest $request, Sanpham $sanpham)    
    {
        $gia_nhap = filter_var($request->gia, FILTER_SANITIZE_NUMBER_INT);
        $gia_ban = filter_var($request->gia_ban, FILTER_SANITIZE_NUMBER_INT);

        $sanpham->update([
            'danhmucsp_id' => $request->danhmucsp_id,
            'thuonghieu_id' => $request->thuonghieu_id,
            'xuatxu_id' => $request->xuatxu_id,
            'ten' => $request->ten,
            'slug' => $request->slug,
            'hinhanh' => $request->hinhanh,
            'image_list' => $request->image_list,
            'soluong' => $request->soluong,
            'gia' => $gia_nhap,
            'gia_ban' => $gia_ban,
            'mota' => $request->mota,
            'mota_ngan' => $request->mota_ngan,
            'nsx' => $request->nsx,
            'hsd' => $request->hsd
        ]);

        BiendongGia::create([
            'sanpham_id' => $sanpham->id,
            'sanpham_gia' => $gia_ban,
            'ngaycapnhat' => Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s')
        ]);

        return redirect()->route('sanpham.index')->with('success','Cập nhật sản phẩm thành công');
    }

    public function priceChart($id)
    {
        $show = Sanpham::find($id);
        $bdgia = BiendongGia::where('sanpham_id',$show->id)->orderBy('ngaycapnhat','ASC')->get();
        return view('admin.sanpham.biendonggia', compact('show','bdgia'));
    }

    

    /* Hàm XÓA */
    public function destroy(Sanpham $sanpham)
    {
        if($sanpham->details->count() > 0){     //hàm details của model Sanpham,Donhang xét sản phẩm tồn tại trong đơn hàng
            return redirect()->route('sanpham.index')->with('error','Tồn tại sản phẩm trong đơn hàng. Không thể xóa!');
        }else{
            $bdg_id = BiendongGia::where('sanpham_id',$sanpham->id)->get();
            foreach($bdg_id as $d){
                $d->delete();
            }
            $sanpham->delete();
            return redirect()->route('sanpham.index')->with('success','Xóa sản phẩm thành công');
        }
    }

    
}