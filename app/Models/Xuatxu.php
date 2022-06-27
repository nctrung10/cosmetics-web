<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuatxu extends Model
{
    use HasFactory;
    protected $table = 'xuatxu';

    protected $fillable = ['ten','slug'];

    // Join 1-n; tham chieu xuatxu_id cua sanpham voi id cua xuatxu trong CSDL, 1 xuatxu co nhieu sanpham
    public function productOrgini()
    {
        return $this->hasMany(Sanpham::class,'xuatxu_id','id');
    }
    
    // thêm localScope của laravel để tìm kiếm tại ngay tại 1 trang
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten','like','%'.$key.'%');
        }
        return $query;
    }
    
    
}