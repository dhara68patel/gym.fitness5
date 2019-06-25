<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table='payments';
         protected $primaryKey = 'paymentid';

    protected $fillable = [
        'paymentid','memberid','userid','actualamount','amount','tax','taxamount','discount','discountamount','discount2','discount2amount','date','paymentdate','schemeid','remainingamount','duedate','otherchargesdetailsid','expenseid','expensedetailsid','employeeid','mode','voucherid','billid','storebillid','receiptno','employeesalaryid','type','remarks','status'];

            public function PaymentType()
      	{
        return $this->belongsTo('App\PaymentType', 'mode');
      	}
      
      	public function member()
      {
        return $this->belongsTo('App\Member','memberid');
      }
      public function User()
      {
        return $this->HasMany('App\User','userid');
      }
       public function PaymentDetails()
        {
          return $this->belongsTo(PaymentDetails::class);
        }
         public function AdminMaster()
        {
        return $this->HasMany('App\AdminMaster','title','tax');
        }
}
