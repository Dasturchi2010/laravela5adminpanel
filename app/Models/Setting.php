<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'logo', 'brand_name', 'description', 'keywords', 'author', 'telegram_link', 'instagram_link', 'youtube_link'];
}
