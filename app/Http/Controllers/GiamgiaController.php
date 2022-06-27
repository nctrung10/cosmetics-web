<?php

namespace App\Http\Controllers;

use App\Models\Giamgia;
use Illuminate\Http\Request;

class GiamgiaController extends Controller
{
    public function index()
    {
        $voucher = Giamgia::orderBy('id','DESC')->paginate(10);
        return view('admin.giamgia.index',compact('voucher'));
    }

    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'ten' => 'required',
            'ma_gg' => 'required|unique:giamgia',
            'hinhthuc' => 'required',
            'giatri' => 'required',
            'soluong' => 'required',
            'ngaybatdau' => 'required',
            'ngayketthuc' => 'required',
        ],[
            'ten.required' => 'Tên mã giảm giá không được để trống',
            'ma_gg.unique' => 'Đã tồn tại mã giảm giá này!',
            'ma_gg.required' => 'Mã giảm giá không được để trống',
            'soluong.required' => 'Số lượng không được để trống',
            'hinhthuc.required' => 'Hình thức không được để trống',
            'giatri.required' => 'Giá trị không được để trống',
            'ngaybatdau.required' => 'Vui lòng nhập ngày bắt đầu cho giảm giá',
            'ngayketthuc.required' => 'Vui lòng nhập ngày kết thúc cho giảm giá',
        ]);
        if(Giamgia::create($request->all())) {
            return redirect()->route('giamgia.index')->with('success','Thêm mã giảm giá thành công');
        }
    }

    public function show(Giamgia $giamgia)
    {
        //
    }

    public function edit(Giamgia $giamgia)
    {
        //
    }
    public function update(Request $request, Giamgia $giamgia)
    {
        //
    }

    public function destroy($id)
    {
        $giamgia = Giamgia::find($id);
        $giamgia->delete();
        return redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }


}
