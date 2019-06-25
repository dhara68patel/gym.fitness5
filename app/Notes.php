<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
    protected $table = 'notes';
   	     protected $primaryKey = 'notesid';
   protected $fillable = [
        'notesid','userid','notes','images',];

}
