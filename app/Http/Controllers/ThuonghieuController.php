<?php

namespace App\Http\Controllers;

use App\Models\Thuonghieu;
use Illuminate\Http\Request;

class ThuonghieuController extends Controller
{
    // Hàm hiển thị danh sách
    public function index()     
    {  
        $brand = Thuonghieu::orderBy('trangthai','DESC')->search()->paginate(9);
        return view('admin.thuonghieu.index', compact('brand'));
    }

    // Hàm hiển thị form thêm mới
    public function create()        
    {
        return view('admin.thuonghieu.create');
    }
    // Hàm submit form thêm mới
    public function store(Request $request)    
    {
        $request->validate([
            'ten' => 'required|unique:thuonghieu',
            'slug' => 'required',
        ],[
            'ten.required' => 'Tên thương hiệu không được để trống',
            'ten.unique' => 'Đã tồn tại thương hiệu này!',
            'slug.required' => 'Slug không được để trống',
        ]);
        if(Thuonghieu::create($request->all())) {
            return redirect()->route('thuonghieu.index')->with('success','Thêm thương hiệu thành công');
        }
    }

    public function show(Thuonghieu $thuonghieu)     
    {
        //
    }
    /* Cập nhật trạng thái ở index */
    public function updatestatus($id)
    {   
        $thuonghieu = Thuonghieu::find($id);
        if($thuonghieu->trangthai == 0){
            $thuonghieu->trangthai = 1;
        }else {
            $thuonghieu->trangthai = 0;
        }
        $thuonghieu->save();
        return back();
    }
    /**  Hàm hiển thị lại form cần cập nhật **/
    public function edit(Thuonghieu $thuonghieu)  
    {
        $id_th = $thuonghieu->id;
        return view('admin.thuonghieu.edit',compact('thuonghieu','id_th'));
    }
    // Hàm submit form cập nhật
    public function update(Request $request, Thuonghieu $thuonghieu)    
    {
        $request->validate([
            'ten' => 'required|unique:thuonghieu,ten,'.request()->id,
            'slug' => 'required',
        ],[
            'ten.required' => 'Tên thương hiệu không được để trống',
            'ten.unique' => 'Đã tồn tại thương hiệu này!',
            'slug.required' => 'Slug không được để trống',
        ]);
        $thuonghieu->update($request->only('ten','trangthai','slug'));
        return redirect()->route('thuonghieu.index')->with('success','Cập nhật thương hiệu thành công');
    }

    /* Hàm xóa */ 
    public function destroy(Thuonghieu $thuonghieu)   
    {   
        if($thuonghieu->productBrand->count() > 0){    
            return redirect()->back()->with('error','Tồn tại sản phẩm trong thương hiệu. Không thể xóa!');
        }else{
            $thuonghieu->delete();
            return redirect()->back()->with('success','Xóa thương hiệu thành công');
        }
    }

}