<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HinhthucThanhtoan extends Model
{
    use HasFactory;

    protected $table = 'hinhthucthanhtoan';
    protected $fillable = ['ten','mota','trangthai'];

    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('id','like','%'.$key.'%')->orWhere('ten','like','%'.$key.'%');
        }
        return $query;
    }
}