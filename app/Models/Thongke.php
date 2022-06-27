<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongke extends Model
{
    use HasFactory;
    protected $table = 'thongke';
    
    protected $fillable = ['doanhthu','loinhuan','ngaydathang'];

}