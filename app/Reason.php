<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table='reason';
    protected $primaryKey = 'reasonid';
    protected $fillable = [
        'reasonid','reason','status',
    ];
    public function Inquiry()
  {
    return $this->hasMany(Inquiry::class);
  }
}
