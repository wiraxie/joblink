<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class resetPasswordController extends Controller
{
	   public function inputcode(Request $request)
	   {
		   header("Content-type: application/json");
		   date_default_timezone_set("Asia/Jakarta");
		   
			$getcode = DB::table('personal_password_reset')->select('code')->where('email', $request->input('email'))->get();
			$unnecessary = array('[', ']', '{', '}', '"', 'code:');
			$getcode2 = str_replace($unnecessary, '', $getcode);
		   
		   if($getcode == NULL || $getcode == '' || $getcode == '[]')
		   {	   
				echo '[{"message":"data tidak ditemukan!"}]';
				http_response_code(404);
				die();
		   }
		   else
		   {
				$code = $request->input('code');

				$datenow = date("Y-m-d");

				$datedb = DB::table('personal_password_reset')->select('expdate')->where('email', $request->input('email'))->get();
				$unnecessary2 = array('[', ']', '{', '}', '"', 'expdate:');
				$datedb = str_replace($unnecessary2, '', $datedb);
				
				if($code != $getcode2)
				{
					echo '[{"message":"kode tidak benar!"}]';
					http_response_code(406);
					die();
				}
				elseif($datenow != $datedb)
				{				
					echo '[{"message":"kode anda sudah tidak berlaku, silakan lakukan/pilih resend code!"}]';
					http_response_code(406);
					die();	
				}
				else
				{
					echo '[{"message":"kode benar!"}]';
					http_response_code(200);
					die();
				}
		   }
	   }
	   
	   public function codeisvalid(Request $request)
	   {
		    header("Content-type: application/json");
			date_default_timezone_set("Asia/Jakarta");
			
			$newpassword = $request->input('newpassword');
			$confirmpassword = $request->input('confirmnewpassword');
			
			$oldpassword = DB::table('personal_registration')->select('password')->where('email', $request->input('email'))->get();
			$unnecessary = array('[', ']', '{', '}', '"', 'password:');
			$oldpassword2 = str_replace($unnecessary, '', $oldpassword);
			//echo $newpassword;die();
			
			$dbid = DB::table('personal_registration')->select('id')->where('email', $request->input('email'))->get();
			$unnecessary4 = array('[', ']', '{', '}', '"', 'id:');
			$dbid = str_replace($unnecessary4, '', $dbid);
			
			if($request->input('email') == NULL || $request->input('email') == '' || $request->input('email') == '[]')
			{
				echo '[{"message":"email harus diisi!"}]';
				http_response_code(406);
				die();
			}
			elseif($newpassword == NULL || $newpassword == '' || $newpassword == '[]')
			{
				echo '[{"message":"password harus diisi!"}]';
				http_response_code(406);
				die();
			}
			elseif($confirmpassword == NULL || $confirmpassword == '[]' || $confirmpassword == '[]')
			{
				echo '[{"message":"konfirmasi harus diisi!"}]';
				http_response_code(406);
				die();
			}
			elseif($newpassword != $confirmpassword)
			{
				echo '[{"message":"password dan konfirmasi tidak sama!"}]';
				http_response_code(406);
				die();
			}
			elseif(base64_encode(md5($newpassword)) == $oldpassword2)
			{
				echo '[{"message":"password baru tidak boleh sama dengan password sebelumnya!"}]';
				http_response_code(406);
				die();
			}
			else
			{
				DB::table('personal_registration')->where('email', $request->input('email'))->update([
					'password'=>base64_encode(md5($newpassword)),
					'updated_at'=>now()
					]);
					
				echo '[{"message":"berhasil!"}]';
				http_response_code(200);
				die();
			}
	   }
}

?>