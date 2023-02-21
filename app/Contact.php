<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'name', 'location', 'address', 'phone'
    ];
}
