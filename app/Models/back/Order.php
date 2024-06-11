<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['family','ostan','city','code_posti','mobile','tel','address','basket','amount','post_type','post_price','user_id','status','pay_type'];
    public function status(){
        return DB::table('order_status')->where('id',$this->status)->first();
    }
    public function type(){
        return DB::table('post_type')->where('id',$this->post_type)->first();
    }
}
