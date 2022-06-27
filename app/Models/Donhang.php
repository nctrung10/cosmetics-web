<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    use HasFactory;
    protected $table = 'donhang';
        
    protected $fillable = ['khachhang_id','httt_id','tenKH','email','sdt','diachi','chuthich','gia_giam','phivanchuyen','tongtien','ngaydathang','trangthai','created_at'];

    // Join 1 - 1; tham chieu id cua khachhang voi khachhang_id cua bang donhang, 1 don hang tuong ung 1 khach hang
    public function cus()
    {
        return $this->hasOne(Khachhang::class,'id','khachhang_id');
    }

    // Join 1-n; tham chieu donhang_id cua bang chitietdonhang voi id cua bang donhang 
    public function details()
    {
        return $this->hasMany(ChitietDonhang::class,'donhang_id', 'id');
    }
    // Join 1-1: 1 don hang co 1 hinhthucthanhtoan
    public function method()
    {
        return $this->hasOne(HinhthucThanhtoan::class,'id','httt_id');
    }

    //localScope laravel
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like','%'.$key.'%')->orWhere('tenKH','like','%'.$key.'%');
        }
        return $query;
    }
   
}