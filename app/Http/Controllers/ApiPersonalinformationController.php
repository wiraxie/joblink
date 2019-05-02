<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiPersonalinformationController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal";        
				$this->permalink   = "personalinformation";    
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
					http_response_code(200);
			
					DB::table('personal')->where('regid', Request::get('id'))->update([
						'personalname'=> Request::get('name'),
						'birthlocation'=> Request::get('birthlocation'),
						'dob'=> Request::get('dob'),
						'gender'=> Request::get('gender'),
						'ethnic'=> Request::get('ethnic'),
						'idtype'=> Request::get('idtype'),
						'idno'=> Request::get('idno'),
						'address'=> Request::get('address'),
						'marital'=> Request::get('marital'),
						'religion'=> Request::get('religion'),
						'updated_at'=> now()
					]);		

					$res = DB::table('personal_registration')
						->join('personal', 'personal_registration.id', '=', 'personal.regid')
						->select('personal_registration.id', 'personal_registration.token', 'personal_registration.email',
								 'personal.personalname as name', 'personal.birthlocation', 'personal.dob', 'personal.gender', 
								 'personal.address', 'personal.ethnic','personal.religion', 'personal.marital', 'personal.idtype', 
								 'personal.idno', 'personal.candidateno', 'personal_registration.created_at as registered_on')
						->where('personal_registration.id', Request::get('id'))
						->orderby('id', 'desc')
						->limit(1)
						->get();
					
					die($res);
				}
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}