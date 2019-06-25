<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Inquiry extends Model
{
     protected $table = 'inquiries';
     
     protected $primaryKey = 'inquiriesid';
     
   protected $fillable = [
        'inquiriesid','firstname',	'lastname',	'gender','email','mobileno','profession',	'alreadymember','remarks','hearabout','packagename','poc',	'note',	'inquirytype','other','reason','reasondescription','promotionalemail','promotionalsms','transactionalsms','transactionalemail','rating','referenceby','status',];

	public function Followup()
	{
	  return $this->HasOne('App\Followup','inquiriesid');
	}
}