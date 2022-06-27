<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Khachhang extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'khachhang';
    
    protected $fillable = ['ten','email','sdt','diachi','password','gioitinh','ngaysinh'];

    // Join 1-n; tham chieu khachhang_id cua bang donhang voi id cua bang khachhang, 1 KH co nhieu don hang
    public function order_list()
    {
        return $this->hasMany(Donhang::class,'khachhang_id', 'id');
    }
    
    public function scopeSearch($query)
    {
        if($key = request()->key){
            $query = $query->where('ten','like','%'.$key.'%')->orWhere('sdt','like','%'.$key.'%');
        }
        return $query;
    }
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
