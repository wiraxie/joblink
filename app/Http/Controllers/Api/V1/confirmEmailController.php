<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class confirmEmailController extends Controller
{
	public function confirmemail(Request $request)
	{	
		header("Content-type: application/json");
		date_default_timezone_set("Asia/Jakarta");
		
		$email = $request->input('email');
		$code = $request->input('code');
		
		$dbemail = DB::table('personal_registration')->select('email')->where('email', $email)->get();
		$unnecessary1 = array('[', ']', '{', '}', '"', 'email:');
		$dbemail = str_replace($unnecessary1, '', $dbemail);
		
		$dbcode = DB::table('personal_registration')->select('code')->where('email', $email)->get();
		$unnecessary2 = array('[', ']', '{', '}', '"', 'code:');
		$dbcode = str_replace($unnecessary2, '', $dbcode);
		
		$checkconfirm = DB::table('personal_registration')->select('status')->where('email', $email)->get();
		$unnecessary3 = array('[', ']', '{', '}', '"', 'status:');
		$checkconfirm2 = str_replace($unnecessary3, '', $checkconfirm);
		
		if($dbemail == '' || $dbemail == null || $dbemail == '[]')
		{		
			http_response_code(404);	
			echo '[{"message":"email not found!"}]';
			die();
		}
		elseif($checkconfirm2 == 'Pending' || $checkconfirm2 != 'Active')
		{	
			if($code != $dbcode)
			{
				http_response_code(406);	
				echo '[{"message":"code is invalid!"}]';
				die();
			}
			else
			{
				DB::table('personal_registration')->where('email', $email)->update([
					'status'=> 'Active',
					'updated_at'=> now()
				]);
				
				http_response_code(200);	
				echo '[{"message":"success!"}]';
				die();
			}
		}
		else
		{
			http_response_code(400);
			echo '[{"message":"email already confirmed!"}]';
			die();
		}
	}
}

?>