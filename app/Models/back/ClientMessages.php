<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMessages extends Model
{
    use HasFactory;
    protected $fillable=['name','email','subject','message'];
}
