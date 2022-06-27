<?php

namespace App\Http\Controllers;

use App\Models\Baiviet;
use Illuminate\Http\Request;

class BaivietController extends Controller
{
    // Hàm hiển thị danh sách
    public function index()     
    {  
        $blog = Baiviet::orderBy('trangthai','DESC')->search()->paginate(10);
        return view('admin.baiviet.index', compact('blog'));
    }

    // Hàm hiển thị form thêm mới
    public function create()        
    {
        return view('admin.baiviet.create');
    }
    // Hàm submit form thêm mới
    public function store(Request $request)    
    {
        $request->validate([
            'chude' => 'required|unique:baiviet',
            'slug' => 'required',
            'hinhanh' => 'required',
            'mota_ngan' => 'required',
            'noidung' => 'required',
        ],[
            'chude.required' => 'Tên bài viết không được để trống',
            'chude.unique' => 'Đã tồn tại bài viết này!',
            'slug.required' => 'Slug không được để trống',
            'hinhanh.required' => 'Hình ảnh không được để trống',
            'mota_ngan.required' => 'Vui lòng nhập mô tả ngắn cho bài viết',
            'noidung.required' => 'Vui lòng nhập nội dung cho bài viết',
        ]);
        if(Baiviet::create($request->all())) {
            return redirect()->route('baiviet.index')->with('success','Thêm bài viết thành công');
        }
    }

    public function show(Baiviet $Baiviet)     
    {
        //
    }
    /* Cập nhật trạng thái ở index */
    public function updatestatus($id)
    {   
        $baiviet = Baiviet::find($id);
        if($baiviet->trangthai == 0){
            $baiviet->trangthai = 1;
        }else {
            $baiviet->trangthai = 0;
        }
        $baiviet->save();
        return back();
    }
    /**  Hàm hiển thị lại form cần cập nhật **/
    public function edit(Baiviet $baiviet)  
    {
        return view('admin.baiviet.edit',compact('baiviet'));
    }
    // Hàm submit form cập nhật
    public function update(Request $request, Baiviet $baiviet)    
    {
        $request->validate([
            'chude' => 'required|unique:baiviet,chude,'.request()->id,
            'slug' => 'required',
            'hinhanh' => 'required',
            'mota_ngan' => 'required',
            'noidung' => 'required',
        ],[
            'chude.required' => 'Tên bài viết không được để trống',
            'chude.unique' => 'Đã tồn tại bài viết này!',
            'slug.required' => 'Slug không được để trống',
            'hinhanh.required' => 'Hình ảnh không được để trống',
            'mota_ngan.required' => 'Vui lòng nhập mô tả ngắn cho bài viết',
            'noidung.required' => 'Vui lòng nhập nội dung cho bài viết',
        ]);
        $baiviet->update($request->all());
        return redirect()->route('baiviet.index')->with('success','Cập nhật bài viết thành công');
    }

    /* Hàm xóa */ 
    public function destroy(Baiviet $baiviet)   
    {   
        $baiviet->delete();
        return redirect()->back()->with('success','Xóa bài viết thành công');
    }

}