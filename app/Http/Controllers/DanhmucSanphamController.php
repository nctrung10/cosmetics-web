<?php

namespace App\Http\Controllers;

use App\Models\DanhmucSanpham;
use Illuminate\Http\Request;
use App\Http\Requests\DanhmucSanpham\StoreRequest;    /* Hàm StoreRequest tạo validation cho form thêm tài khoản */
use App\Http\Requests\DanhmucSanpham\UpdateRequest;   /* Hàm UpdateRequest tạo validation cho form cập nhật tài khoản */

class DanhmucSanphamController extends Controller
{
    // Hàm hiển thị danh sách
    public function index()       
    {  
        $category = DanhmucSanpham::orderBy('trangthai','DESC')->search()->get()/* ->paginate(10) */;
        $parentCat = DanhmucSanpham::orderBy('ten','ASC')->get();
        return view('admin.danhmucsanpham.index', compact('category','parentCat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        // Hàm hiển thị form thêm mới
    {
        /* $parentCategory = DanhmucSanpham::where('parent_id',0)->get(); */
        return view('admin.danhmucsanpham.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)     // Hàm submit form thêm mới
    {
        if(DanhmucSanpham::create($request->all())) {
            return redirect()->route('danhmucsanpham.index')->with('success','Thêm danh mục thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanhmucSanpham  $danhmucsanpham
     * @return \Illuminate\Http\Response
     */
    public function show(DanhmucSanpham $danhmucsanpham)      // Hàm hiển thị xem chi tiết
    {
        //
    }

    /* Cập nhật trạng thái ở index */
    public function updatestatus($id)
    {   
        $danhmuc = DanhmucSanpham::find($id);
        if($danhmuc->trangthai == 0){
            $danhmuc->trangthai = 1;
        }else {
            $danhmuc->trangthai = 0;
        }
        $danhmuc->save();
        return back();
    }

    /**  Hàm hiển thị lại form cần cập nhật **/
    public function edit(DanhmucSanpham $danhmucsanpham)  //truyền vào Model => tự truy vấn theo ID
    {
        $parentCat = DanhmucSanpham::orderBy('ten','ASC')->select('id','ten')->get();
        return view('admin.danhmucsanpham.edit', compact('danhmucsanpham','parentCat'));
    }
    // Hàm submit form cập nhật
    public function update(UpdateRequest $request, DanhmucSanpham $danhmucsanpham)    
    {
        $danhmucsanpham->update($request->only('ten','trangthai','parent_id','slug'));
        return redirect()->route('danhmucsanpham.index')->with('success','Cập nhật danh mục thành công');
    }

    /* Hàm xóa item */ 
    public function destroy(DanhmucSanpham $danhmucsanpham)   
    {   
        if($danhmucsanpham->products->count() > 0){     //hàm products trong model DanhmucSanpham check sp tồn tại trong danhmuc
            return redirect()->route('danhmucsanpham.index')->with('error','Tồn tại sản phẩm trong danh mục. Không thể xóa!');
        }else{
            $danhmucsanpham->delete();
            return redirect()->route('danhmucsanpham.index')->with('success','Xóa danh mục thành công');
        }
    }

}