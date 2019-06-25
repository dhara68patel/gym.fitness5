<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model

{
	protected $table = 'employee';
   protected $primaryKey = 'employeeid';
   protected $fillable = [
        'employeeid', 'roleid','username','role','email','address','city','department','salary','workinghourfrom1','workinghourto1','workinghourfrom2','workinghourto2','dob','gender','mobileno','password', 'photo','accountno','accountname','ifsccode','bankname','branchname','branchcode','status',];

  public function Role()
{
  return $this->belongsTo('App\Role', 'roleid');
}
}
