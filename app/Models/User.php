<?php

namespace App\Models;

use App\Models\back\AdminInfo;
use App\Models\front\Comment;
use App\Models\front\Code;
use App\Models\Address;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function address(){
        return $this->hasMany(Address::class,'user_id','id');
    }
    public function code(){
        return $this->hasOne(Code::class,'user_id','id');
    }
    public function comments(){
        return $this->hasMany(Comment::class,'user_id','id');
    }
    public function adminInfo(){
        return $this->hasOne(AdminInfo::class);
    }
   
}
