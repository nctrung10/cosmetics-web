<?php

namespace App\Http\Controllers;

use App\Models\Khuyenmai;
use App\Models\DanhmucSanpham;
use Illuminate\Http\Request;

class KhuyenmaiController extends Controller
{
    // Hàm hiển thị danh sách
    public function index()       
    {  
        $promotion = Khuyenmai::orderBy('ten','ASC')->search()->paginate(9);
        $selectCat = DanhmucSanpham::orderBY('ten','ASC')->get();
        return view('admin.khuyenmai.index', compact('promotion','selectCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        // Hàm hiển thị form thêm mới
    {
        return view('admin.khuyenmai.create');
    }
    
    public function store(Request $request)     // Hàm submit form thêm mới
    {
        $request->validate([
            'ten' => 'required|unique:khuyenmai',
            'giatri' => 'required|integer|between:1,80',
            'danhmucsp_id' => 'required',
            'ngaybatdau' => 'required|date|after_or_equal:today',
            'ngayketthuc' => 'required|date|after_or_equal:ngaybatdau',
        ],[
            'ten.required' => 'Tên khuyến mãi không được để trống',
            'ten.unique' => 'Đã tồn tại khuyến mãi này!',
            'giatri.required' => 'Giá trị khuyến mãi không được để trống',
            'giatri.integer' => 'Giá trị khuyến mãi phải là số nguyên',
            'giatri.between' => 'Giá trị khuyến mãi phải từ 1% và không quá 80%',
            'danhmucsp_id.required' => 'Danh mục sản phẩm không được để trống',
            'ngaybatdau.required' => 'Vui lòng chọn ngày bắt đầu cho khuyến mãi',   
            'ngaybatdau.after_or_equal' => 'Ngày bắt đầu phải sau hoặc bằng ngày hôm nay',
            'ngayketthuc.required' => 'Vui lòng chọn ngày kết thúc cho khuyến mãi',
            'ngayketthuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
        ]);
        if(Khuyenmai::create($request->all())) {
            return redirect()->route('khuyenmai.index')->with('success','Thêm khuyến mãi thành công');
        }
    }

    
    public function show(Khuyenmai $khuyenmai)      // Hàm hiển thị xem chi tiết
    {
        //
    }

    /* Cập nhật trạng thái ở index */
    public function updatestatus($id)
    {   
        $khuyenmai = Khuyenmai::find($id);
        if($khuyenmai->trangthai == 0){
            $khuyenmai->trangthai = 1;
        }else {
            $khuyenmai->trangthai = 0;
        }
        $khuyenmai->save();
        return back();
    }

    /**  Hàm hiển thị lại form cần cập nhật **/
    public function edit(Khuyenmai $khuyenmai)  //truyền vào Model => tự truy vấn theo ID
    {
        $selectCat = DanhmucSanpham::orderBY('ten','ASC')->select('id','ten')->get();
        return view('admin.khuyenmai.edit', compact('khuyenmai','selectCat'));
    }
    
    public function update(Request $request, Khuyenmai $khuyenmai)    // Hàm submit form cập nhật
    {
        $request->validate([
            'ten' => 'required|unique:khuyenmai,ten,'.request()->id,
            'giatri' => 'required|integer|between:1,80',
            'danhmucsp_id' => 'required',
            'ngaybatdau' => 'required|date|after_or_equal:today',
            'ngayketthuc' => 'required|date|after_or_equal:ngaybatdau',
        ],[
            'ten.required' => 'Tên khuyến mãi không được để trống',
            'ten.unique' => 'Đã tồn tại khuyến mãi này!',
            'giatri.required' => 'Giá trị khuyến mãi không được để trống',
            'giatri.integer' => 'Giá trị khuyến mãi phải là số nguyên',
            'giatri.between' => 'Giá trị khuyến mãi phải từ 1% và không quá 80%',
            'danhmucsp_id.required' => 'Danh mục sản phẩm không được để trống',
            'ngaybatdau.required' => 'Vui lòng chọn ngày bắt đầu cho khuyến mãi',
            'ngaybatdau.after_or_equal' => 'Ngày bắt đầu phải sau hoặc bằng ngày hôm nay',
            'ngayketthuc.required' => 'Vui lòng chọn ngày kết thúc cho khuyến mãi',
            'ngayketthuc.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu',
        ]);
        $khuyenmai->update($request->all());
        return redirect()->route('khuyenmai.index')->with('success','Cập nhật khuyến mãi thành công');
    }

    
    /* Hàm xóa */ 
    public function destroy(Khuyenmai $khuyenmai)   
    {   
        $khuyenmai->delete();
        return redirect()->back()->with('success','Xóa khuyến mãi thành công');
        
    }

}