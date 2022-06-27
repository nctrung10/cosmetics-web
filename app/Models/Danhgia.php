<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhgia extends Model
{
    use HasFactory;
    protected $table = 'danhgia';
    
    protected $fillable = ['khachhang_id','sanpham_id','sosao','binhluan'];

    // Join 1-n; tham chieu khachhang_id cua bang danhgia voi id cua bang khachhang, 1 danh gia tuong ung 1 kh
    public function review()
    {
        return $this->hasOne(Khachhang::class,'id', 'khachhang_id');
    }

}