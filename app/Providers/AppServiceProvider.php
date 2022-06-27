<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\DanhmucSanpham;
use App\Helper\CartHelper;
use App\Models\Thuonghieu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //sử dụng phân trang của boostrap
        Paginator::useBootstrap();
        
        //global function - truyền biến cho toàn bộ các view
        view()->composer('*', function($view){
            $view->with([
                'danhmuc' => DanhmucSanpham::where('trangthai',1)->orderBy('ten','ASC')->get(),
                'thuonghieu' => Thuonghieu::where('trangthai',1)->orderBy('ten','ASC')->get(),
                'cart' => new CartHelper(),
            ]);
        });

    }
}
