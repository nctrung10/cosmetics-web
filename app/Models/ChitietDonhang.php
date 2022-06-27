<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChitietDonhang extends Model
{
    use HasFactory;
    protected $table = 'chitietdonhang';
    
    protected $fillable = ['donhang_id','sanpham_id','soluong','tonggia'];

    //1-1: 1 chitietdonhang tuong ung 1 sanpham
    public function product()
    {
        return $this->hasOne(Sanpham::class,'id','sanpham_id');
    }


}