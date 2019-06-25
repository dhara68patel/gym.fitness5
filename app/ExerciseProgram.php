<?php

namespace App;
use App\Member;

use Illuminate\Database\Eloquent\Model;

class ExerciseProgram extends Model
{
    protected $table = 'exerciseprogram';
      protected $primaryKey = 'exerciseprogramid';
   protected $fillable = [
       'memberid','baseball','basketball','boxing','kickboxing','skiing','football','golf','hiking','pilates','racquetball','indoorcycling','kayaking','rockclimbing','running','soccer','swimming','tennis','triathlon','walking','weighttrainning','yoga','stretching','other','otheractivity','oftenweekexercise','highpriority','mediumppiority','lowpriority','very','semi','barely',];

	 public function member()
	{
	  return $this->belongsTo('App\Member','memberid');
	}
}