<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    
    protected $fillable = ['donhang_id','p_transaction_id','p_money','p_note','p_vnp_reponse_code','p_code_vnpay','p_code_bank','p_time'];
    

}