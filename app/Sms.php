<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sms extends Authenticatable
{
    use Notifiable;
   protected $table = 'sms';

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  protected $fillable = [
                        
                        'name' ,   
                        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
}
