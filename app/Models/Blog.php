<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'photo' , 'date' , 'author' , 'mini_text', 'text', 'images' , 'slug'];
}
