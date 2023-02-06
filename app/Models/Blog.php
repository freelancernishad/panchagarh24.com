<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'cat_id',
        'cat_name',
        'title',
        'author',
        'slug',
        'video',
        'short_description',
        'long_description',
        'fiture',
        'read',
        'featured_post',
    ];
}
