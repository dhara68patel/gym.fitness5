<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptassignlevel extends Model
{
    protected $table='ptassignlevel';
    protected $fillable = [
        'ptassignlevelid','trainerid','levelid','percentage','status',
    ];
}
