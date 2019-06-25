<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Admin extends Authenticatable
{
	use Notifiable;

    protected $table ='admin';
        protected $primaryKey = 'adminid';
	      
   protected $fillable = [
   	
        'adminid','employeeid','name','role','address','mobileno','username','password','status',
    ];
//    public function Employee()
// {
//   return $this->hasMany('App\Employee', 'Role_id');
// }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

}
 