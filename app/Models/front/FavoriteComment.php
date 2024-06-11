<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteComment extends Model
{
    use HasFactory;
    public function FavoriteComment(){
        return $this->belongsTo(Comment::class,'comment_id');
    }
}
