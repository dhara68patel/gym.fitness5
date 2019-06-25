<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptlevel extends Model
{
    protected $table='ptlevel';
    protected $fillable = [
        'ptlevelid','percentage',
    ];
}
