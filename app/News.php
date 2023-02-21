<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'title', 'content', 'publishDate', 'display', 'promote'
    ];
}
