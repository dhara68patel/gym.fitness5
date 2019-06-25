<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentDetails extends Model
{
	  protected $table='paymentdetails';
    protected $fillable = [
        'paymentdetailsid','receiptno','billid','storebillid','amount',];
  
}

