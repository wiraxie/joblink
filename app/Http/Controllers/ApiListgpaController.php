<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiListgpaController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "formal_edu_gpa";        
				$this->permalink   = "listgpa";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkregid = DB::table('personal_registration')->where('id', $_GET['id'])->get();
				
				if($checkregid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					/*$data = DB::table('formal_edu_gpa')
					->select('id', 'id as gpaid', 'edulevel', 'major', 'year', 'gpa', 'created_at')
					->where('regid', $_GET['id'])
					->get();*/
					
					$data = DB::table('formal_edu_header')
					->select('id as gpaid', 'edulevel', 'major', 'startyear as year', 'lastgpa as gpa')
					->where('regid', $_GET['id'])
					->get();
					http_response_code(200);
					die($data);
				}
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}