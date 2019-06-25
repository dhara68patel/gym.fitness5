<?php

namespace App;
use App\RootScheme;


use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
	   protected $table = 'schemes';
	    protected $primaryKey = 'schemeid';
    protected $fillable = [
        'schemeid','rootschemeid','schemename','numberofdays','baseprice','tax','male','female','actualprice','workinghourfrom','workinghourto','validity','status',];

         public function RootScheme()
    {
    	
        return $this->belongsTo('App\RootScheme','rootschemeid');
    }
    public function Memberpackages()
    {
    	
        return $this->hasMany('App\Memberpackages','schemeid');
    }

}
