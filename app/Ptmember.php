<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ptmember extends Model
{
    protected $table='ptmember';
    protected $primaryKey = 'ptmemberid';
    protected $fillable = [
        'ptmemberid','TrainerId','MemberId','fromdate','todate','hoursfrom','ActualDate','ActualTime','status','FinalTrainerId','PackageId','PaymentStatus','ConductedDate','ConductedTime'
    ];
}
