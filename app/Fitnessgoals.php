<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fitnessgoals extends Model
{
	 protected $table = 'fitnessgoals';
	  protected $primaryKey = 'fitnessgoalsid';
   protected $fillable = [
   'memberid','losebodyfat','developmuscle','rehabilitateaninjury','improvebalance','improveflexibility','nutritionaleducation','designbeginnersprogram','desigadvancedprogram','trainspecific','safety','makeexercisefun','motivation','other','otherhelp','anniversary','specificgoalsa','specificgoalsb','specificgoalsc',];


 public function member()
{
  return $this->belongsTo('App\Member','memberid');
}}
