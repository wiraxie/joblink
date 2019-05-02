<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiMessageController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "message";        
				$this->permalink   = "message";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
				//This method will be execute before run the main process
				
				$data = DB::table('message')->select('id', 'message')->orderBy('id', 'DESC')->limit(1)->get();
				die($data);
				
				/*
				$deleted_at = DB::table('message')->select('deleted_at')->orderBy('id', 'DESC')->limit(1)->get();
				$unnecessary1 = array('[', ']', '{', '}', '"', 'deleted_at:');
				$deleted_at = str_replace($unnecessary1, '', $deleted_at);

				if($deleted_at != '')
				{
					echo '[{"id":null,"message":null}]';
					http_response_code(200);
					die();
				}
				else
				{}*/
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query
				
		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}