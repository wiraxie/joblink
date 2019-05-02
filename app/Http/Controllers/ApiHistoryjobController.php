<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiHistoryjobController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "applicants";        
				$this->permalink   = "historyjob";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$q2 = $_GET['q2'];
				$page = $_GET['q3'];
				$limit=7;
				$nextset = $page+$limit-2;
				
				if($page == 0 || $page == 1)
				{
					$query = "SELECT 
					applicants.regid as userid,
					applicants.id as applicantid,
					jobs_update.id as jobid,				
					applicants.appdate applydate, 
					applicants.status, 
					applicants.note, 
					applicant_status.statname as status, 
					companies.comname, 
					companies.location, 
					CONCAT('http://joblink.adnet.id/', companies.comlogo) as comlogo, 
					companies.comdesc,  
					jobs_update.jobdate as releasedate, 
					jobs_update.expdate as enddate, 
					jobs_update.position, 
					jobs_update.jobdesc,
					applicants.tanggapan
					FROM applicants
					LEFT JOIN applicant_status ON applicants.status = applicant_status.id
					LEFT JOIN jobs_update ON applicants.jobid = jobs_update.id
					LEFT JOIN companies ON jobs_update.companyid = companies.id
					WHERE applicants.regid=".$q2."
					AND applicants.deleted_at IS NULL
					ORDER BY applicants.id DESC
					LIMIT 0,".$limit.";";
				}
				else
				{
					$query = "SELECT 
					applicants.regid as userid,
					applicants.id as applicantid,
					jobs_update.id as jobid,				
					applicants.appdate applydate, 
					applicants.status, 
					applicants.note, 
					applicant_status.statname as status, 
					companies.comname, 
					companies.location, 
					CONCAT('http://joblink.adnet.id/', companies.comlogo) as comlogo, 
					companies.comdesc,  
					jobs_update.jobdate as releasedate, 
					jobs_update.expdate as enddate, 
					jobs_update.position, 
					jobs_update.jobdesc,
					applicants.tanggapan
					FROM applicants
					LEFT JOIN applicant_status ON applicants.status = applicant_status.id
					LEFT JOIN jobs_update ON applicants.jobid = jobs_update.id
					LEFT JOIN companies ON jobs_update.companyid = companies.id
					WHERE applicants.regid=".$q2."
					AND applicants.deleted_at IS NULL
					ORDER BY applicants.id DESC
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