<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followupcalldetails extends Model
{
    protected $table = 'followupcalldetails';

     protected $primaryKey = 'followupcalldetailsid';
     
      protected $fillable = [
        'followupcalldetailsid','inquiriesid','callcompletedby','callresponse','
			calldate','callduration','callnotes','callrating','schemeid','schedulenextcalldate','scheduleassign','trainer','freetrial','freetrialpackage',];
}
