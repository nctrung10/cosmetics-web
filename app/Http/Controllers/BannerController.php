<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = DB::table('banner')->orderBy('created_at','DESC')->paginate(10);
        $searchB = DB::table('banner')->select('ten')->get();
        return view('admin.banner.index', compact('banner','searchB'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'hinhanh' => 'required',
            'mota' => 'required',
        ],[
            'ten.required' => 'Vui lòng nhập tên cho banner',
            'hinhanh.required' => 'Vui lòng chọn hình ảnh cho banner',
            'mota.required' => 'Vui lòng nhập mô tả cho banner',
        ]);
        $addBanner = DB::table('banner')->insert([
            'ten' => $request->ten,
            'hinhanh' => $request->hinhanh,
            'link' => $request->link,
            'mota' => $request->mota,
            'trangthai' => $request->trangthai,
        ]);
        if($addBanner) {
            return redirect()->route('banner.index')->with('success', 'Thêm banner thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /* Cập nhật trạng thái ở index */
    public function updatestatus($id)
    {   
        $banner = Banner::find($id);
        if($banner->trangthai == 0){
            $banner->trangthai = 1;
        }else {
            $banner->trangthai = 0;
        }
        $banner->save();
        return back();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'ten' => 'required',
            'hinhanh' => 'required',
            'mota' => 'required',
        ],[
            'ten.required' => 'Tên banner không được để trống',
            'hinhanh.required' => 'Ảnh banner không được để trống',
            'mota.required' => 'Mô tả không được để trống',
        ]);
        $banner->update($request->all());
        return redirect()->route('banner.index')->with('success','Cập nhật banner thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        //xóa nhiều dòng
        //$deleteBanner = DB::table('banner')->destroy([$id]);
        //xóa 1 dòng
        $deleteBanner = DB::table('banner')->where('id',$id)->delete();
        if($deleteBanner) {
            return redirect()->back()->with('success','Xóa thành công');
        }
        
        
    }
}
