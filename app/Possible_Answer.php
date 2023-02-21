<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Possible_Answer extends Model
{
    public $table = "possible_answers";

    protected $fillable = [
        'questionId', 'answer'
    ];
}
