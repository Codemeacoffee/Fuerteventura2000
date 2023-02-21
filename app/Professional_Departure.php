<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Professional_Departure extends Model
{
    public $table = "professional_departures";

    protected $fillable = [
        'courseId', 'title'
    ];
}
