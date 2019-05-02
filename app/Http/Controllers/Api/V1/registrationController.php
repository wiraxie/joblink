<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrationController extends Controller
{
	public function registration(Request $request)
	{	
		$code = rand(100000, 999999);
	
		$emailtemplate = 
				'
					<!DOCTYPE html>
					<html lang="en">
					<head>
					<?php

					?>
						<title>confirmation</title>
						<meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<style>
						body
						{
							font-family: arial;
							border: solid;
						}

						img
						{
							display: block;
							margin-left: auto;
							margin-right: auto;
						}
						
						.btn 
						{
							background-color: #1660b4;
							border: none;
							color: #1660b4;
							padding: 12px 28px;
							text-align: center;
							text-decoration: none;
							display: inline-block;
							font-size: 14px;
							margin: 4px 2px;
							
							border-radius: 10px;
							
							margin-left: 30%;
							margin-right: 30%;
							
							display: block;
						}

						div
						{
							background-color: #fff;
							max-width: 700px; 
							max-height: 720px; 
							margin: auto; 
						}
						
						.left
						{
							text-align: left;
							padding-left: 8px;
							padding-right: 8px;
						}
						
						.footer
						{
							background-color: #fff;
							border-bottom-right-radius: 14px;
							border-bottom-left-radius: 14px;
							
							padding-top: 5px;
							padding-bottom: 5px;
						}
						
						.rad
						{
							border-radius: 14px;
						}
						
						
						.btn-default {
							color: #333;
							background-color: #fff;
							border-color: #ccc
						}

						.btn-default.active,
						.btn-default.focus,
						.btn-default:active,
						.btn-default:focus,
						.btn-default:hover,
						.open>.dropdown-toggle.btn-default {
							color: #333;
							background-color: #e6e6e6;
							border-color: #adadad
						}

						.btn-default.active,
						.btn-default:active,
						.open>.dropdown-toggle.btn-default {
							background-image: none
						}
						

						</style>
					</head>
					<body>

						<div class="rad">
						<br>
							<img src="https://i.imgur.com/Q03Esps.jpg" width="200px" height="auto">
							<p class="left">Terima kasih telah melakukan pendaftaran pada aplikasi Joblink Mobile. Anda harus melakukan konfirmasi email sebelum menggunakan aplikasi, silakan klik masukkan kode di bawah ini untuk mengkonfirmasi pendaftaran anda.</p>
							<p class="left">Kode Konfirmasi Pendaftaran: '.$code.'<p>
						
							<p class="left">Jika ada pertanyaan, silakan hubungi customer support kami melalui 
							email support@joblink.co.id </p>
							
							<br>
							<br>
							<div class="footer">
									<h5 class="left">Salam,</h5>
									<h4 class="left">PT. Joblink Mandiri</h4>
									
							
							</div>

						</div>
					</body>
					</html>

				';
	
	
		date_default_timezone_set("Asia/Jakarta");
		header('Content-type: application/json');
	
		$email = $request->input('email');
		$password = $request->input('password');
		$confirmpassword = $request->input('confirmpassword');
		
		$dbemail = DB::table('personal_registration')->select('email')->where('email', $email)->get();
		$unnecessary1 = array('[', ']', '{', '}', '"', 'email:');
		$dbemail = str_replace($unnecessary1, '', $dbemail);
		
		if($dbemail != '')
		{	
			DB::table('personal_registration')->where('email', $email)->update([
				'code'=> $code,
			]);
	
			echo '[{"message":"email sudah terdaftar, silakan periksa kode pendaftaran pada email anda jika anda belum melakukan konfirmasi!"}]';
			$this->sendmail2($email, 'Kode Verifikasi Pendaftaran', $emailtemplate);
			http_response_code(401);
			die();
		}
		elseif($email == '' || $email == '[]' || $email == null)
		{
			echo '[{"message":"email harus diisi!"}]';
			http_response_code(401);
			die();
		}
		elseif(strpos($email, '@') === FALSE || strpos($email, '.') === FALSE)
		{
			echo '[{"message":"format email salah!"}]';
			http_response_code(401);
			die();
		}
		elseif($password == '' || $password == '[]' || $password == null)
		{
			echo '[{"message":"password harus diisi!"}]';
			http_response_code(401);
			die();
		}
		elseif($confirmpassword == '' || $confirmpassword == '[]'|| $confirmpassword == null)
		{
			echo '[{"message":"konfirmasi harus diisi!"}]';
			http_response_code(401);
			die();
		}
		elseif($password != $confirmpassword)
		{
			echo '[{"message":"password dan konfirmasi tidak sama!"}]';
			http_response_code(401);
			die();
		}
		else
		{	
			DB::table('personal_registration')->insert([
				'status'=> 'Pending',
				'code'=> $code,
				'email'=> $email,
				'password'=> base64_encode(md5($password)),
				'created_at'=> now()
			]);
			
			$this->sendmail2($email, 'Kode Verifikasi Pendaftaran', $emailtemplate);ob_clean();
			
			//echo '[{"message":"berhasil!"}]';
			http_response_code(200);
			die();
		}
	}
	
	public function registrationcode(Request $request)
	{
		date_default_timezone_set("Asia/Jakarta");
		header('Content-type: application/json');
		
		$checkemail = DB::table('personal_registration')->select('email')->where('email', $request->input('email'))->get();
		
		$checkcode = DB::table('personal_registration')->select('code')->where('email', $request->input('email'))->get();
		$unnecessary = array('[', ']', '{', '}', '"', 'code:');
		$checkcode = str_replace($unnecessary, '', $checkcode);
		
		if($checkemail == '[]')
		{
			echo '[{"message":"data tidak ditemukan!"}]';
			http_response_code(404);
			die();
		}
		elseif($request->input('code') !=  $checkcode)
		{
			echo '[{"message":"kode tidak benar!"}]';
			http_response_code(406);
			die();
		}
		else
		{
			DB::table('personal_registration')->where('email', $request->input('email'))->update([
				'status'=> 'Active',
				'updated_at'=> now()
			]);
			
			$regid = DB::table('personal_registration')->select('id')->where('email', $request->input('email'))->get();
			
			$year = date('Y');
			$month = date('m');
			$query = "SELECT candidateno 
			from personal where left (candidateno, 6) = '".$year.$month."'
			order by id desc limit 1";
			
			$res=DB::select($query);

			$res = array_values($res);
			$res = json_encode($res);
			$unnecessary = array('[', ']', '{', '}', '"', 'candidateno:');
			$data = str_replace($unnecessary, '', $res);
			
			if($regid  != '[]')
			{
				$unnecessary2 = array('[', ']', '{', '}', '"', 'id:');
				$regid2 = str_replace($unnecessary2, '', $regid);
				
				$checkifexist = DB::table('personal')->select('regid')->where('regid', $regid2)->get();				
				
				if($checkifexist != '[]')
				{
					echo '[{"message":"akun telah aktif!"}]';
					http_response_code(406);
					die();
				}
				else
				{
					if($res == '[]')
					{
						DB::table('personal')->insert([
							'regid'=> $regid2,
							'candidateno'=> $year.$month.'001',
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal')->insert([
							'regid'=> $regid2,
							'candidateno'=> $data+1,
							'created_at'=> now()
						]);
					}
				}
				
				echo '[{"message":"berhasil!"}]';
				http_response_code(200);
				die();
			}
		}
	}
	
	public function sendmail2($to, $subject, $message)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,"http://mobile2.adnet.id/sendmail.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,
				"to=".$to."&subject=".urlencode($subject)."&message=". urlencode($message));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$server_output = curl_exec ($ch);
		curl_close ($ch);

		echo '[{"message":"email telah dikirim"}]';
		http_response_code(200);
		die();
	}
}

?>