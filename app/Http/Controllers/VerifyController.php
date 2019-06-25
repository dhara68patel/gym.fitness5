<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
   //  public function getVerify()
   // {
   // 	return view('admin.verify');
   // }
   // public function postVerify(Request $request)
   // {
   // 		if($user =User::where('code',$request->code)->first()){
   // 			$user->active=1;
   // 			$user->code=null;
   // 			$user->save();
   // 			return back()->withMessage('your account is activated');
   // 		}
   // 		else{
   // 			return back()->withMessage('code is incorrect! please try again');
   // 		}
   // }

	$mobileNumber = $request['mobileno'];
	$rndno=rand(1000, 9999);
   $senderId = "GPPAYE";
	
	// Your message to send, Add URL encoding here.
	
	// Define route
	$route = 4;
	// Prepare you post parameters
	$postData = array (
			'auth_key' => $authKey,
			'mobiles' => $mobileNumber,
			'message' => $message,
			'sender' => $senderId,
			'route' => $route 
	);
	// print_r($postData);exit();
	
	// API URL
	$url = "http://api.msg91.com/api/sendhttp.php?country=91&sender=GPPAYE&route=4&mobiles=".$mobileNumber."&authkey=180997AiW7HNSNS5c6cffc3&message=Hello! This is a test message";
	
	// init the resource
	$ch = curl_init ();
	curl_setopt_array ( $ch, array (
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData 
	// ,CURLOPT_FOLLOWLOCATION => true
		) );
	
	// Ignore SSL certificate verification
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
	curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
	
	// get response
  $output = curl_exec ( $ch );	// Print error if any
	if (curl_errno ( $ch )) {
		echo 'error:' . curl_error ( $ch );
	}
	// echo $output;exit();
	curl_close ( $ch );

}
