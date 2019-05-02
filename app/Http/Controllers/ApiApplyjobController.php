<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiApplyjobController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "applicants";        
				$this->permalink   = "applyjob";    
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
					$checkapplied = DB::table('applicants')->select('id')
									->where('regid', Request::get('id'))
									->where('jobid', Request::get('jobid'))
									->get();
					
					if(Request::get('jobid') == '' || Request::get('jobid') == null)
					{
						echo '[{"message":"please fill the jobid section!"}]';
						http_response_code(400);
						die();
					}
					/*elseif(Request::get('note') == '' || Request::get('note') == null)
					{
						echo '[{"message":"please fill the note section!"}]';
						http_response_code(400);
						die();
					}*/
					elseif($checkapplied != '[]')
					{
						echo '[{"message":"anda sudah terdaftar!"}]';
						http_response_code(406);
						die();
					}
					else
					{
						DB::table('applicants')->insert([
							'regid'=> Request::get('id'),
							'jobid'=> Request::get('jobid'),
							'note'=> Request::get('note'),
							'status'=> '1',
							'appdate'=> now(),
							'created_at'=> now()
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