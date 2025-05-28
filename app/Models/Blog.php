<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
