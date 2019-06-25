<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model
{
   protected $table = 'notify';
	 protected $primaryKey = 'notifyid';
   
   protected $fillable = [
        'notifyid','userid','details',];
}
