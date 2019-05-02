<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiAdditionalinfosController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_factors";        
				$this->permalink   = "additionalinfos";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkregid = DB::table('personal_registration')->where('id', Request::get('id'))->get();
				
				$checkfactorregid = DB::table('personal_factors')->where('regid', Request::get('id'))->get();
				
				if($checkregid == '[]')
				{
					echo '[{"message":"data not found!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					if($checkfactorregid == '[]')
					{
						DB::table('personal_factors')->insert([
							'regid'=> Request::get('id'),
							'additional'=> Request::get('info'),
							'created_at'=> now()
						]);
					}
					elseif($checkfactorregid != '[]')
					{
						DB::table('personal_factors')->where('regid', Request::get('id'))->update([
							'additional'=> Request::get('info'),
							'updated_at'=> now()
						]);
					}
					
					$returndata = DB::table('personal_factors')->select('id' ,'additional as info', 'created_at')->where('regid', Request::get('id'))->get();
					http_response_code(200);
					die($returndata);
				}
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}