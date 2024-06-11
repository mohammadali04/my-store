<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AdminInfo extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','img','address','phone'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
