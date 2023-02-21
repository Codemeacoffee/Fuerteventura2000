<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'code', 'title', 'hours'
    ];
}
