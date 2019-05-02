<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiUpdatepasswordController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_registration";        
				$this->permalink   = "updatepassword";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkregid = DB::table('personal_registration')->where('id', Request::get('id'))->get();
				
				if($checkregid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					$oldpassword = DB::table('personal_registration')->select('password')->where('id', Request::get('id'))->get();
					$unnecessary = array('[', ']', '{', '}', '"', 'password:');
					$oldpassword = str_replace($unnecessary, '', $oldpassword);
					
					$oldpasswordinput = Request::get('oldpassword');
					$newpassword = Request::get('newpassword');
					$confirmnewpassword = Request::get('confirmnewpassword');
					
					if(base64_encode(md5($oldpasswordinput)) != $oldpassword)
					{
						echo '[{"message":"password lama salah!"}]';
						http_response_code(401);
						die();
					}
					elseif($newpassword == '' || $newpassword == null || $confirmnewpassword == '' || $confirmnewpassword == null)
					{
						echo '[{"message":"password dan konfirmasi password harus diisi!"}]';
						http_response_code(401);
						die();
					}
					elseif($newpassword != $confirmnewpassword)
					{
						echo '[{"message":"password dan konfirmasi password tidak cocok!"}]';
						http_response_code(401);
						die();
					}
					elseif(base64_encode(md5($newpassword)) == $oldpassword)
					{
						echo '[{"message":"=password baru tidak boleh sama dengan password sekarang!"}]';
						http_response_code(401);
						die();
					}
					else
					{
						DB::table('personal_registration')->where('id', Request::input('id'))->update([
							'password'=> base64_encode(md5($newpassword)),
							'updated_at'=> now()
						]);
						
						echo '[{"message":"berhasil!"}]';
						http_response_code(200);
						die();
					}
				}
				
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}