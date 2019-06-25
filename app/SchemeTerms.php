<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchemeTerms extends Model
{
    protected $table='schemeterms';
    protected $primaryKey = 'schemetermid';
    protected $fillable = [
        'schemetermid','schemeid','termsid','value','status',
    ];
     public function Term()
{
  return $this->belongsTo('App\Terms', 'termid');
}
}
