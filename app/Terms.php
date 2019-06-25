<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
   protected $table='terms';
     protected $primaryKey = 'termsid';
    protected $fillable = [
        'termsid','terms','minutes','appointment',
    ];
}

            	