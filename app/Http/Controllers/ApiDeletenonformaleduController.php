<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiDeletenonformaleduController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "nonformal_edu";        
				$this->permalink   = "deletenonformaledu";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checknonfrid = DB::table('nonformal_edu')->where('id', Request::get('nonfrid'))->get();
				
				if($checknonfrid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					DB::table('nonformal_edu')->where('id', Request::get('nonfrid'))->delete();
					
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