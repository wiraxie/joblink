<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiFeedbackController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "feedbacks";        
				$this->permalink   = "feedback";    
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
					if(Request::get('title') == null || Request::get('title')== '' || Request::get('detail') == null || Request::get('detail') == '[]')
					{
						echo '[{"message":"title and detail are required!"}]';
						http_response_code(406);
						die();
					}
					elseif(strlen(Request::get('detail')) > 300)
					{
						echo '[{"message":"detail must not longer than 300 characters!"}]';
						http_response_code(406);
						die();
					}
					else
					{
						DB::table('feedbacks')->insert([
							'personalid'=> Request::get('id'),
							'title'=> Request::get('title'),
							'detail'=> Request::get('detail'),
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