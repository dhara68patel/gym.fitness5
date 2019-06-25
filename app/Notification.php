<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
   
   protected $fillable = [
        'notificationid','mobileno','sms','mail','call'];
}
