<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminMaster extends Model
{
	protected $table = 'adminmasters';
	  protected $primaryKey = 'adminmasterid'; 
     protected $fillable = [
        'adminmasterid','title','description', 'status',];

	   public function Payment()
		{
			return $this->belongsTo('App\Payment','tax');
		}
}
