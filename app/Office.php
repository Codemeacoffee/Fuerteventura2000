<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
      'title', 'description', 'location', 'end_date', 'display', 'promote'
    ];
}
