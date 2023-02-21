<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page', 'name', 'value'
    ];
}
