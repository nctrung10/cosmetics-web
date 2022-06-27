<?php

namespace App\Http\Controllers;

use App\Models\Taikhoan;
use App\Http\Requests\Taikhoan\StoreRequest;
use App\Http\Requests\Taikhoan\UpdateRequest;
use App\Models\Khachhang;
use Illuminate\Http\Request;

class TaikhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataTK = Taikhoan::orderBy('id','ASC')->search()->paginate(4);
        
        return view('admin.taikhoan.index', compact('dataTK'));
    }

    /* Show Customer Info */
    public function customerInfo()
    {
        $cus_info = Khachhang::orderBy('created_at','DESC')->search()->get();
        return view('admin.taikhoan.customerindex',compact('cus_info'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.taikhoan.create');
    }
    public function store(StoreRequest $request)
    {
        $mahoapass = bcrypt($request->password);    //Mã hóa mật khẩu
        $request->merge(['password' => $mahoapass]);
        
        if(Taikhoan::create($request->all())) {
            return redirect()->route('taikhoan.index')->with('success','Thêm tài khoản mới thành công');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Taikhoan  $taikhoan
     * @return \Illuminate\Http\Response
     */
    public function show(Taikhoan $taikhoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Taikhoan  $taikhoan
     * @return \Illuminate\Http\Response
     */
    public function edit(Taikhoan $taikhoan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Taikhoan  $taikhoan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taikhoan $taikhoan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Taikhoan  $taikhoan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taikhoan $taikhoan)
    {
        //
    }
}
