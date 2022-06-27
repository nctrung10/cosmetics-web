<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* KHÁCH HÀNG */
Route::get('/', 'HomeController@index')->name('trangchu');
Route::post('tim-kiem', 'HomeController@search')->name('timkiem');
Route::post('autocomplete-ajax', 'HomeController@autocomplete');
//for chatbot
Route::get('tim-kiem-san-pham', 'HomeController@search');


Route::post('lay-lai-mat-khau', 'HomeController@recoveryPass')->name('recoverypass');
Route::get('phuc-hoi-mat-khau', 'HomeController@updatenewPass')->name('updatenewpass');
Route::post('phuc-hoi-mat-khau', 'HomeController@post_updatenewPass')->name('updatenewpass');

Route::get('dang-nhap', 'HomeController@login')->name('dangnhap');
Route::post('dang-nhap', 'HomeController@post_login')->name('dangnhap');
Route::get('dangxuat', 'HomeController@logout')->name('dangxuat');


Route::get('dang-ky', 'KhachhangController@create')->name('dangky');
Route::post('dang-ky','KhachhangController@store')->name('dangky.store');
    
Route::get('lien-he', 'HomeController@contact')->name('contact');
Route::post('lien-he', 'HomeController@post_contact')->name('contact');

Route::get('blog', 'HomeController@showBlog')->name('show.blog');
Route::get('blog/{slug}', 'HomeController@blogDetail')->name('blog.detail');

Route::prefix('tai-khoan')->group(function () {
    Route::get('thong-tin-ca-nhan', 'KhachhangController@edit')->name('thongtinkh');
    Route::put('thong-tin-ca-nhan', 'KhachhangController@update')->name('thongtinkh.update');

    Route::get('doi-mat-khau', 'KhachhangController@showchangePass')->name('thongtinkh.doimatkhau');
    Route::post('doi-mat-khau','KhachhangController@changePass')->name('thongtinkh.changepass');

    Route::get('lich-su-mua-hang', 'KhachhangController@purchaseHistory')->name('thongtinkh.lichsumuahang');
    Route::post('cancel-order/{id}','KhachhangController@cancelOrder')->name('thongtinkh.huydonhang');
});

Route::get('/{slug}', 'HomeController@view')->name('view');   //danhmuc,chitietsanpham,thuonghieu
Route::post('danh-gia/{id}', 'HomeController@comment')->name('danhgia');


/* Route::get('/{slug}', 'HomeController@productdetail')->name('chitietsp');  */
/* Route::get('giohang', 'HomeController@cart')->name('giohang'); */
/* Route::get('thanhtoan', 'HomeController@payment')->name('thanhtoan'); */

Route::prefix('cart')->group(function () {
    Route::get('giohang.html', 'CartController@view')->name('cart.view');
    Route::get('add/{id}', 'CartController@add')->name('cart.add');
    Route::get('remove/{id}', 'CartController@remove')->name('cart.remove');
    Route::get('update/{id}', 'CartController@update')->name('cart.update');
    Route::post('update-all', 'CartController@updateAll')->name('cart.updateAll'); 
    Route::get('clear', 'CartController@clear')->name('cart.clear');

    Route::post('voucher', 'CartController@useVoucher')->name('cart.voucher');
    Route::get('delete-voucher', 'CartController@delVoucher')->name('delVoucher');

    Route::post('payment/online', 'CartController@createPayment')->name('payment.online');
    Route::get('vnpay/return', 'CartController@vnpayReturn')->name('vnpay.return');
    Route::post('vnpay/success', 'CartController@vnpaySuccess')->name('vnpay.success');
});

Route::prefix('thanhtoan')->group(function () {
    Route::get('view', 'ThanhtoanController@form')->name('thanhtoan');
    Route::post('view', 'ThanhtoanController@submit_form')->name('thanhtoan');
});


/* ADMIN */ 
Route::group(['prefix' => 'admin', 'middleware' => 'taikhoan'], function() {
    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::post('filter-by-date', 'AdminController@filterbyDate')->name('admin.filterdate');
    Route::post('show-days', 'AdminController@showDays')->name('admin.showdays');
    Route::post('filter-by-timeline', 'AdminController@filterbyTimeline')->name('admin.filtertimeline');

    Route::get('file', 'AdminController@file')->name('admin.file');
    //xem thong tin khachhang
    Route::get('taikhoan/thong-tin-khach-hang','TaikhoanController@customerInfo')->name('taikhoan.customerindex');
    //khohang
    Route::get('sanpham/warehouse','SanphamController@warningProduct')->name('sanpham.warning');
    Route::get('sanpham/exp-product','SanphamController@expProduct')->name('sanpham.expire');

/* CÁC METHOD TRONG CONTROLLER RESOURCE
* GET => example.index  : danh sách     --route này để show giao diện
* GET => example.create : hiển thị form thêm mới    --route này để show giao diện
* POST => example.store : khi submit form thêm mới
* GET => example.show   : xem chi tiết     --route này để show giao diện  
* GET => example.edit   : hiển thị form edit    --route này để show giao diện
* PUT|PATCH => example.update    : khi submit form edit
* DELETE => example.destroy : khi xóa
*/
    Route::resources([
        'banner' => 'BannerController',        //url => tên controller
        'taikhoan' => 'TaikhoanController',
        'donhang' => 'DonhangController',
        'danhmucsanpham' => 'DanhmucSanphamController',
        'sanpham' => 'SanphamController',
        'xuatxu' => 'XuatxuController',
        'thuonghieu' => 'ThuonghieuController',
        'giamgia' => 'GiamgiaController',
        'khuyenmai' => 'KhuyenmaiController',
        'baiviet' => 'BaivietController',
    ]);
    
    //delete
    Route::get('banner/delete/{id}','BannerController@destroy')->name('banner.delete');
    Route::get('giamgia/delete/{id}','GiamgiaController@destroy')->name('giamgia.destroy');
    //trangthai
    Route::get('thuonghieu/trangthai/{id}','ThuonghieuController@updatestatus')->name('thuonghieu.trangthai');
    Route::get('khuyenmai/trangthai/{id}','KhuyenmaiController@updatestatus')->name('khuyenmai.trangthai');
    Route::get('banner/trangthai/{id}','BannerController@updatestatus')->name('banner.trangthai');
    Route::get('baiviet/trangthai/{id}','BaivietController@updatestatus')->name('baiviet.trangthai');
    Route::get('danhmucsanpham/trangthai/{id}','DanhmucSanphamController@updatestatus')->name('danhmucsanpham.trangthai');
    //sanpham
    Route::get('sanpham/bien-dong-gia/{id}','SanphamController@priceChart')->name('sanpham.pricechart');
    //donhang
    Route::get('donhang/in-don-hang/{order_code}','DonhangController@showInvoice')->name('donhang.print');
    
});
Route::get('admin/login','AdminController@login')->name('login');
Route::post('admin/login','AdminController@postLogin')->name('login');
Route::get('admin/logout', 'AdminController@logout')->name('logout');



