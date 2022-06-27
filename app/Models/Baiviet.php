<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baiviet extends Model
{
    use HasFactory;
    protected $table = 'baiviet';

    protected $fillable = ['chude','slug','mota_ngan','noidung','hinhanh','trangthai'];

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like','%'.$key.'%')->orWhere('chude','like','%'.$key.'%');
        }
        return $query;
    }

}