<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiResetpasswordController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_password_reset";        
				$this->permalink   = "resetpassword";    
				$this->method_type = "post";    
		    }
		

		     public function hook_before(&$postdata) {
		        //This method will be execute before run the main process
									
				$code = rand(10000, 99999);
									
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
							<p class="left">Anda telah melakukan permintaan untuk reset password. Masukkan kode di bawah ini untuk mereset password anda atau silakan abaikan email ini jika anda tidak pernah melalukan permintaan reset password.</p>
							<p class="left">Kode Reset Password: '.$code.'<p>
						
							<p class="left">Jika ada pertanyaan, silakan hubungi customer support kami melalui 
							email support@joblink.co.id .</p>
							
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
				
				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkemail =  DB::table('personal_registration')->select('email')->where('email', Request::get('email'))->get();
				
				//echo filter_var(Request::get('email'), FILTER_VALIDATE_EMAIL);die();
				if(Request::get('email') == NULL || Request::get('email') == '' || Request::get('email') == '[]')
				{
					echo '[{"message":"email harus diisi!"}]';
					http_response_code(406);
					die();
				}
				elseif(strpos(Request::get('email'), '@') === FALSE || strpos(Request::get('email'), '.') === FALSE)
				{	
					echo '[{"message":"format email salah!"}]';
					http_response_code(406);
					die();
				}
				elseif($checkemail == null || $checkemail == '' || $checkemail == '[]')
				{
					echo '[{"message":"email tidak terdaftar!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					$checkemail2 = DB::table('personal_password_reset')->select('email')->where('email', Request::get('email'))->get();
					$unnecessary = array('[', ']', '{', '}', '"', 'email:');
					$checkmail3 = str_replace($unnecessary, '', $checkemail2);
					//echo $checkmail3;die();
					
					if($checkemail2 == NULL || $checkemail2 == '' || $checkemail2 == '[]')
					{
						DB::table('personal_password_reset')->insert(
						[
							'email'=> Request::get('email'),
							'code'=> $code,
							'expdate'=> now(),
							'created_at'=> now()
						]);
						
						$this->sendmail2(Request::get('email'), 'Password Reset Code', $emailtemplate);ob_clean();
					}
					else
					{
						DB::table('personal_password_reset')->where('email', $checkmail3)->update(
						[
							'code'=>$code,
							'expdate'=> now(),
							'updated_at'=>now()
						]);
						
						$this->sendmail2(Request::get('email'), 'Password Reset Code', $emailtemplate);ob_clean();
						
					}
					
					echo '[{"message":"success to send an email!"}]';
					http_response_code(200);
					die();
				}
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

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

				echo '[{"message":"success to send an email"}]';
				http_response_code(200);
				die();
			}

		}