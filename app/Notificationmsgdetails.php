<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificationmsgdetails extends Model
{
    protected $table = 'notificationmsgdetails';
   
   protected $fillable = [
        'notoficationmsgdetailsid','mobileno','smsmsg','mailmsg','callnotes'];
}
