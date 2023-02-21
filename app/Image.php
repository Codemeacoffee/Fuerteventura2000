<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name', 'usedBy', 'relationId', 'alt'
    ];
}
