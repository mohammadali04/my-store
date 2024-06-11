<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['refrence_id','family','ostan','city','code_posti','mobile','tel','address','basket','amount','post_type','post_price','user_id','status','pay_type','authority','pay_card','bank_name'];
}
