<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khuyenmai extends Model
{
    use HasFactory;
    
    protected $table = 'khuyenmai';
    protected $fillable = ['danhmucsp_id','ten','giatri','trangthai','ngaybatdau','ngayketthuc'];
    
    // Join 1 - 1; tham chieu id cua danhmucsanpham voi danhmucsp_id cua bang khuyenmai, 1 khuyenmai tuong ung 1 danh muc
    public function cat()
    {
        return $this->hasOne(DanhmucSanpham::class,'id','danhmucsp_id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like','%'.$key.'%')->orWhere('ten','like','%'.$key.'%');
        }
        return $query;
    }
}
