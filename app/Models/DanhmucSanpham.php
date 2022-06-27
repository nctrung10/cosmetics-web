<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucSanpham extends Model
{
    use HasFactory;
    protected $table = 'danhmucsanpham';

    protected $fillable = ['ten','trangthai','slug','parent_id'];

    // Join 1-n; tham chieu danhmucsp_id cua sanpham voi id cua danhmucsanpham trong CSDL, 1 danhmuc co nhieu sanpham
    public function products()
    {
        return $this->hasMany(Sanpham::class,'danhmucsp_id','id');
    }
    //hiện danh mục cha không đệ quy
    // So sanh parent_id cua danhmucsanpham voi id cua no, 1 danhmuc cha co nhieu danhmuc con
    public function children() 
    {
        return $this->hasMany(DanhmucSanpham::class,'danhmucsp_id','id');
    }

 
    // thêm localScope của laravel để tìm kiếm ngay tại 1 trang
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten','like','%'.$key.'%');
        }
        return $query;
    }
    
}