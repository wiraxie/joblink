<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiListjobController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "companies";        
				$this->permalink   = "listjob";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$page=$_GET['q2'];
				$limit=10;
				$nextset = $page+$limit-2;
				
				if($page == 0 || $page == 1)
				{
					$query = "SELECT 
					jobs_update.id as jobid, 
					companies.comname, 
					companies.location, 
					CONCAT('http://joblink.adnet.id/', companies.comlogo) as comlogo, 
					companies.comdesc, 
					jobs_update.jobdate as releasedate, 
					jobs_update.expdate enddate, 
					jobs_update.position, 
					jobs_update.jobdesc
					FROM companies
					INNER JOIN jobs_update ON companies.id = jobs_update.companyid
					WHERE jobs_update.expdate >= now()
					AND jobs_update.deleted_at IS NULL
					ORDER BY jobs_update.id DESC
					LIMIT 0,".$limit.";";
					
				}
				else
				{
					$query = "SELECT 
					jobs_update.id as jobid, 
					companies.comname, 
					companies.location, 
					CONCAT('http://joblink.adnet.id/', companies.comlogo) as comlogo, 
					companies.comdesc, 
					jobs_update.jobdate as releasedate, 
					jobs_update.expdate enddate, 
					jobs_update.position, 
					jobs_update.jobdesc
					FROM companies
					INNER JOIN jobs_update ON companies.id = jobs_update.companyid
					WHERE jobs_update.expdate >= now()
					AND jobs_update.deleted_at IS NULL
					ORDER BY jobs_update.id DESC
					LIMIT ".$nextset.",".$limit.";";
				}
				
				$res=DB::select($query);

				$res = array_values($res);
				$res = json_encode($res);
						
				die($res);
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}