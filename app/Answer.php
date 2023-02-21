<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'questionnaireId', 'question', 'answer'
    ];
}
