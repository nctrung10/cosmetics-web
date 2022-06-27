<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    
    protected $fillable = ['ten','danhmucsp_id','thuonghieu_id','xuatxu_id','slug','hinhanh','image_list','soluong','gia','gia_ban','mota','mota_ngan','nsx','hsd'];

    // Join 1 - 1; tham chieu id cua danhmucsanpham voi danhmucsp_id cua bang sanpham, 1 sp tuong ung 1 danh muc
    public function cat()
    {
        return $this->hasOne(DanhmucSanpham::class,'id','danhmucsp_id');
    }
    // Join 1 - 1; bang thuonghieu vs bang sanpham
    public function brand()
    {
        return $this->hasOne(Thuonghieu::class,'id','thuonghieu_id');
    }
    // Join 1 - 1; bang xuatxu vs bang sanpham
    public function orgini()
    {
        return $this->hasOne(Xuatxu::class,'id','xuatxu_id');
    }

    // Join 1-n; tham chieu sanpham_id cua bang chitietdonhang voi id cua bang sanpham 
    public function details()
    {
        return $this->hasMany(ChitietDonhang::class,'sanpham_id', 'id');
    }
    
    
    //localScope của laravel để tìm kiếm ngay tại 1 trang
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten','like','%'.$key.'%')->orWhere('id','like','%'.$key.'%');
        }
        return $query;
    }
    

}
