<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientMessages extends Model
{
    use HasFactory;
    protected $fillable=['name','email','subject','message'];
}
