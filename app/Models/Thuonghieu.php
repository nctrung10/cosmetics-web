<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuonghieu extends Model
{
    use HasFactory;
    protected $table = 'thuonghieu';
    
    protected $fillable = ['ten','slug','trangthai'];

    // Join 1-n; tham chieu thuonghieu_id cua sanpham voi id cua thuonghieu trong CSDL, 1 thuonghieu co nhieu sanpham
    public function productBrand()
    {
        return $this->hasMany(Sanpham::class,'thuonghieu_id','id');
    }
    
    // thêm localScope của laravel để tìm kiếm tại ngay tại 1 trang
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten','like','%'.$key.'%');
        }
        return $query;
    }
    //globalScope
    
}