<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiUpdatenonformaleduController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "nonformal_edu";        
				$this->permalink   = "updatenonformaledu";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checknonformalid = DB::table('nonformal_edu')->where('id', Request::get('nonfrid'))->get();
				
				$startperiod = Request::get('startperiod');
				$endperiod = Request::get('endperiod');
				$major 	= Request::get('major');
				$instname = Request::get('institutionname');
				$instloc = Request::get('location');
				$study = Request::get('studyprog');
				$note = Request::get('note');
				
				if($checknonformalid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					if($major == '' || $major == null)
					{
						echo '[{"message":"major required!"}]';
						http_response_code(406);
						die();
					}
					elseif($study == '' || $study == null)
					{
						echo '[{"message":"study prog. required!"}]';
						http_response_code(406);
						die();
					}
					elseif($startperiod == '' || $startperiod == null)
					{
						echo '[{"message":"start period required!"}]';
						http_response_code(406);
						die();
					}
					elseif($endperiod == '' || $endperiod == null)
					{
						echo '[{"message":"end period required!"}]';
						http_response_code(406);
						die();
					}
					elseif($instname == '' || $instname == null)
					{
						echo '[{"message":"institution name required!"}]';
						http_response_code(406);
						die();
					}
					elseif($instloc == '' || $instloc == null)
					{
						echo '[{"message":"institution location required!"}]';
						http_response_code(406);
						die();
					}
					else
					{
						DB::table('nonformal_edu')->where('id', Request::get('nonfrid'))->update([
							'major'=> $major,
							'study_field'=> $study,
							'startperiod'=> $startperiod,
							'endperiod'=> $endperiod,
							'institution_name'=> $instname,
							'location'=> $instloc,
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