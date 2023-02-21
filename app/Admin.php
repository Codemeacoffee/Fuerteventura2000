<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $fillable = [
        'email', 'password', 'session_token'
    ];

    protected $hidden = [
        'password', 'session_token'
    ];
}
