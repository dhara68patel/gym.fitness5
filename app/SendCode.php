<?php
namespace App;
use Nexmo\Laravel\Facade\Nexmo;
/**
 * 
 */
class SendCode 
{
	public static  function sendCode($phone){
		$code = rand(1111,9999);
		$nexmo = app('Nexmo\Client');
		$nexmo->message()->send([
			'to' => '+91'.(int)$phone,
			'from' => '+918554353578',
			'text'=>'verify code:'.$code,
		]);
		return $code;
	}
	
}