<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiVersionController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "app_version";        
				$this->permalink   = "version";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process
				
				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$data = DB::table('app_version')->select('id', 'version', 'createdate')
												->where('status', 'active')
												->orderBy('id', 'desc')
												->limit(1)
												->get();					
				die($data);
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}