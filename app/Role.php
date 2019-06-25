<?php

namespace App;
use App\Employee;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table='roles';
	      protected $primaryKey = 'roleid';
   protected $fillable = [
        'roleid','employeerole','path','description','status',
    ];

}
 