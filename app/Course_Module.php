<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Course_Module extends Model
{
    public $table = "course_modules";

    protected $fillable = [
       'courseId', 'moduleId'
    ];
}
