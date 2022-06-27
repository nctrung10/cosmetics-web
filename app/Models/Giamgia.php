<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Giamgia extends Model
{
    use HasFactory;
    
    protected $table = 'giamgia';
    protected $fillable = ['ma_gg','ten','hinhthuc','giatri','soluong','ngaybatdau','ngayketthuc'];
    
}
