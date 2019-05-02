<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiDeletegpaController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "formal_edu_gpa";        
				$this->permalink   = "deletegpa";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkgpaid = DB::table('formal_edu_gpa')->where('id', Request::get('gpaid'))->get();
				
				if($checkgpaid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					DB::table('formal_edu_gpa')->where('id', Request::get('gpaid'))->delete();
					
					echo '[{"message":"berhasil!"}]';
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

		}