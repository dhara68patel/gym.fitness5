<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $table = 'files';
       protected $primaryKey = 'filesid';

   protected $fillable = [
   	
        'filesid','memberid','filename',];
}
