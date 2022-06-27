<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiendongGia extends Model
{
    use HasFactory;
    protected $table = 'biendonggia';
    
    protected $fillable = ['sanpham_id','sanpham_gia','ngaycapnhat'];

}