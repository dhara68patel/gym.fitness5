<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OTPVerify extends Model
{
     protected $table='otpverify';

     protected $primaryKey = 'otpverifyid';

    protected $fillable = [
        'otpverifyid','mobileno','email','code','isexpired',];
}

