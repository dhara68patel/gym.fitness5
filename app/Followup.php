<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
     protected $table = 'followup';
     protected $primaryKey = 'followupid';
      protected $fillable = [
        'followupid','inquiryid','userid',	'followuptime','
remarks','followupdays','followuptakendate','reason','status',];

public function Inquiry()
{
   return $this->HasOne('App\Inquiry','inquiryid');
}
}
