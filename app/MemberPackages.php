<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberPackages extends Model
{
		protected $table = 'memberpackages';
		     protected $primaryKey = 'memberpackagesid';
		   protected $fillable = [
		        'memberpackagesid','userid','schemeid','joindate','expiredate','extra1','status',];

//      public function Scheme()
// {
//    return $this->hasOne('App\Scheme','id','Scheme_id');
// }
// public function User()
// {
//    return $this->hasMany('App\User','id','User_id');
// }
// public function Payment()
// {
//    return $this->hasMany('App\Payment','id','User_id');
// }
		public function Scheme()
			{
			   return $this->belongsTo('App\Scheme','schemeid');
			}
		public function User()
			{
			   return $this->hasMany('App\User','memberpackagesid','userid');
			}
		public function Payment()
			{
			   return $this->hasMany('App\Payment','userid');
			}
		public function Member()
			{
			   return $this->hasMany('App\Member','memberpackagesid');
			}
}

