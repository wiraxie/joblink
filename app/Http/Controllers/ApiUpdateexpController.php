<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiUpdateexpController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_experiences";        
				$this->permalink   = "updateexp";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkexpid = DB::table('personal_experiences')->where('id', Request::get('expid'))->get();
				
				$workplacename = Request::get('workplacename');
				$workloc = Request::get('workplaceloc');
				$jobname = Request::get('jobname');
				$jobdesc = Request::get('jobdesc');
				$startperiod = Request::get('startperiod');
				$endperiod = Request::get('endperiod');
				$status = Request::get('status');
				$salary = Request::get('salary');
				$note = Request::get('note');
				
				if($checkexpid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					if($workplacename == '' || $workplacename == null)
					{
						echo '[{"message":"workplace name required!"}]';
						http_response_code(406);
						die();
					}
					/*elseif($workloc == '' || $workloc == null)
					{
						echo '[{"message":"workplace location required!"}]';
						http_response_code(406);
						die();
					}*/
					elseif($jobname == '' || $jobname == null)
					{
						echo '[{"message":"job name required!"}]';
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
					else
					{
						DB::table('personal_experiences')->where('id', Request::get('expid'))->update([
							'workplacename'=> $workplacename,
							'workplaceloc'=> $workloc,
							'jobname'=> $jobname,
							'jobdesc'=> $jobdesc,
							'status'=> $status,
							'startperiod'=> $startperiod,
							'endperiod'=> $endperiod,
							'salary'=> $salary,
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