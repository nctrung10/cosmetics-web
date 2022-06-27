<?php

namespace App\Http\Controllers;

use App\Models\Xuatxu;
use Illuminate\Http\Request;

class XuatxuController extends Controller
{
    
    public function index()       // Hàm hiển thị danh sách
    {  
        $orgini = Xuatxu::orderBy('ten','ASC')->search()->paginate(9);
        return view('admin.xuatxu.index', compact('orgini'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()        // Hàm hiển thị form thêm mới
    {
        return view('admin.xuatxu.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)     // Hàm submit form thêm mới
    {
        $request->validate([
            'ten' => 'required|unique:xuatxu',
            'slug' => 'required',
        ],[
            'ten.required' => 'Tên xuất xứ không được để trống',
            'ten.unique' => 'Đã tồn tại xuất xứ này!',
            'slug.required' => 'Slug không được để trống',
        ]);
        if(Xuatxu::create($request->all())) {
            return redirect()->route('xuatxu.index')->with('success','Thêm xuất xứ thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\xuatxu  $xuatxu
     * @return \Illuminate\Http\Response
     */
    public function show(Xuatxu $xuatxu)      // Hàm hiển thị xem chi tiết
    {
        //
    }

    /**  Hàm hiển thị lại form cần cập nhật **/
    public function edit(Xuatxu $xuatxu)  //truyền vào Model => tự truy vấn theo ID
    {
        return view('admin.xuatxu.edit', compact('xuatxu'));
    }
    
    public function update(Request $request, Xuatxu $xuatxu)    // Hàm submit form cập nhật
    {
        $request->validate([
            'ten' => 'required|unique:xuatxu,ten,'.request()->id,
            'slug' => 'required',
        ],[
            'ten.required' => 'Tên xuất xứ không được để trống',
            'ten.unique' => 'Đã tồn tại xuất xứ này!',
            'slug.required' => 'Slug không được để trống',
        ]);
        $xuatxu->update($request->only('ten','trangthai','slug'));
        return redirect()->route('xuatxu.index')->with('success','Cập nhật xuất xứ thành công');
    }

    /* Hàm xóa */ 
    public function destroy(Xuatxu $xuatxu)   
    {   
        if($xuatxu->productOrgini->count() > 0){    
            return redirect()->back()->with('error','Tồn tại sản phẩm trong xuất xứ. Không thể xóa!');
        }else{
            $xuatxu->delete();
            return redirect()->back()->with('success','Xóa xuất xứ thành công');
        }
    }

}