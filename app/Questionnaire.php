<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'title', 'type', 'location', 'announcement', 'content', 'user', 'password'
    ];
}
