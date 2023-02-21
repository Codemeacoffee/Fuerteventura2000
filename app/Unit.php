<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $fillable = [
        'code', 'title', 'hours'
    ];
}
