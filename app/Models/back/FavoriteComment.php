<?php

namespace App\Models\back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteComment extends Model
{
    use HasFactory;
    protected $fillable=['comment_id'];
   
}
