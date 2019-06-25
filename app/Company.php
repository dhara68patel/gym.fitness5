<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $table = 'company';
   protected $primaryKey = 'companyid'; 
   protected $fillable = [
        'companyid','companyname','gstno','contactpersonname','contactperonmobileno','companyaddress','status',];

  public function Member()
{
  return $this->belongsTo('App\Member');
}
}
