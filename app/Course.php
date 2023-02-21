<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'title', 'description', 'init_date', 'end_date', 'location',  'type', 'receiver', 'schedule', 'level', 'onSite', 'display', 'promote', 'sector', 'hours', 'teacher', 'teacherDescription', 'requirements', 'price', 'alt'
    ];
}
