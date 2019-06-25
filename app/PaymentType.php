<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
	 protected $table='paymenttypes';
	 protected $primaryKey = 'paymenttypeid';
    protected $fillable = [
        'paymenttypeid','paymenttype','description','status',
    ];
    public function Payment()
  {
    return $this->hasMany(PaymentType::class);
  }
}
