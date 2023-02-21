<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'questionnaireId', 'type', 'question'
    ];
}
