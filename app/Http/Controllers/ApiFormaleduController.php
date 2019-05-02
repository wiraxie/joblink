<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiFormaleduController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "formal_edu_header";        
				$this->permalink   = "formaledu";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$checkregid = DB::table('personal_registration')->where('id', Request::get('id'))->get();
				
				$edulevel = Request::get('edulevel');
				$startyear = Request::get('startyear');
				$endyear = Request::get('endyear');
				$faculty = Request::get('faculty');
				$major 	= Request::get('major');
				$instname = Request::get('institutionname');
				$instloc = Request::get('location');
				$title = Request::get('title');
				$note = Request::get('note');
				$gpa = Request::get('gpa');
				
				if($checkregid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				else
				{
					if($edulevel == '' || $edulevel == null)
					{
						echo '[{"message":"tingkat pendidikan harus diisi!"}]';
						http_response_code(406);
						die();
					}
					elseif($startyear == '' || $startyear == null)
					{
						echo '[{"message":"periode/tahun masuk harus diisi!"}]';
						http_response_code(406);
						die();
					}
					elseif($endyear == '' || $endyear == null)
					{
						echo '[{"message":"periode/tahun lulus harus diisi!"}]';
						http_response_code(406);
						die();
					}
					/*elseif($instname == '' || $instname == null)
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
					}*/
					else
					{
						DB::table('formal_edu_header')->insert([
							'regid'=> Request::get('id'),
							'edulevel'=> $edulevel,
							'startyear'=> $startyear,
							'endyear'=> $endyear,
							'faculty'=> $faculty,
							'major'=> $major,
							'institution_name'=> $instname,
							'institution_location'=> $instloc,
							'title'=> $title,
							'note'=> $note,
							'lastgpa'=> $gpa,
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