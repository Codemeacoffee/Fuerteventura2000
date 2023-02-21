<?php

namespace Fuerteventura2000;

use Illuminate\Database\Eloquent\Model;

class Module_Unit extends Model
{
    public $table = "module_units";

    protected $fillable = [
        'moduleId', 'unitId'
    ];
}
