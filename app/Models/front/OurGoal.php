<?php

namespace App\Models\front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurGoal extends Model
{
    use HasFactory;
    protected $fillable=['top_description','right_description','left_description','img'];
}
