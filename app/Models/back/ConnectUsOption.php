<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectUsOption extends Model
{
    use HasFactory;
    protected $fillable=['title','value','icon'];
}
