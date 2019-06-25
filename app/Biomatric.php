<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Ixudra\Curl\Facades\Curl;
use DB;
use App\Member;


class Biomatric extends Model
{
    protected $table = 'biomatric';
   
   protected $fillable = [
        'userid','punchdatetime','serialnumber'];




public static function testuserupload($request){

		$member = Member::select('id')->get()->last();
		$member = $member->id + 1;
		$memfirstname = $request->get('firstname');
		$memexpiry = $request->get('setexpirydate');
		$memaddbio = $request->get('addbio');
	

		 if ($memaddbio == 1) {
	
	
		 $uu = Curl::to('localhost:8080/iclock/api/WebAPI/UploadUsersInBiometric?StaffName='.$memfirstname.'&StaffBiometricCode='.$member.'&IsAdmin=false&SerialNumber=DC67C417C3749B37')->get();

		 $setexpiry = Curl::to('http://localhost:8080/iclock/api/WebAPI/SetUserExpiration?SerialNumber=DC67C417C3749B37&StaffBiometricCode='.$member.'&ExpirationDate='.$memexpiry.'')->get();

		 $result = json_decode($uu);

		 print_r($uu);

		}



}

}