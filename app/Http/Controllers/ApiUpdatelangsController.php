<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiUpdatelangsController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_langs";        
				$this->permalink   = "updatelangs";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checklangid = DB::table('personal_langs')->where('id', Request::get('langid'))->get();
				
				$langname = Request::get('langname');
				$langlevel = Request::get('langlevel');
				$note = Request::get('note');
				
				if($checklangid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					if($langname == '' || $langname == null)
					{
						echo '[{"message":"language name required!"}]';
						http_response_code(406);
						die();
					}
					elseif($langlevel == '' || $langlevel == null)
					{
						echo '[{"message":"language level required!"}]';
						http_response_code(406);
						die();
					}
					else
					{
						DB::table('personal_langs')->where('id', Request::get('langid'))->update([
							'langname'=> $langname,
							'langlevel'=> $langlevel,
							'note'=> $note,
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