<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
	public function login(Request $request)
	{	
		//echo 'test: '.number_format((float)$this->getram(), 2, '.', '');die();
		date_default_timezone_set("Asia/Jakarta");
	
		$email = $request->input('email');
		$password = $request->input('password');
	
		$dbemail = DB::table('personal_registration')->select('email')->where('email', $email)->get();
		$unnecessary1 = array('[', ']', '{', '}', '"', 'email:');
		$dbemail = str_replace($unnecessary1, '', $dbemail);
		
		$dbpassword = DB::table('personal_registration')->select('password')->where('email', $email)->get();
		$unnecessary2 = array('[', ']', '{', '}', '"', 'password:');
		$dbpassword = str_replace($unnecessary2, '', $dbpassword);

		$dbstatus = DB::table('personal_registration')->select('status')->where('email', $email)->get();
		$unnecessary3 = array('[', ']', '{', '}', '"', 'status:');
		$dbstatus = str_replace($unnecessary3, '', $dbstatus);

		if($dbemail == '' || $dbemail == null || $dbemail == '[]')
		{		
			echo '[{"message":"data tidak ditemukan!"}]';
			http_response_code(404);
			die();
		}
		elseif($dbstatus == 'Pending' || $dbstatus != 'Active')
		{			
			echo '[{"message":"Aktivasi akun anda!"}]';
			http_response_code(406);
			die();
		}
		elseif($email != $dbemail ||  base64_encode(md5($password)) != $dbpassword)
		{			
			echo '[{"message":"email atau password tidak benar!"}]';
			http_response_code(401);
			die();
		}
		else
		{
			$checkstatus = DB::table('personal_registration')->select('status')->where('email', $request->input('email'))->get();
			$unnecessary4 = array('[', ']', '{', '}', '"', 'status:');
			$checkstatus = str_replace($unnecessary4, '', $checkstatus);
			
			if($checkstatus == 'Pending' || $checkstatus != 'Active')
			{
				echo '[{"message":"Aktivasi akun anda!"}]';
				http_response_code(406);
				die();
			}
			else
			{
				http_response_code(200);
				$token = base64_encode(base64_encode((strtotime(now())*32)));
		
				$regid = DB::table('personal_registration')->select('id')->where('email', $request->input('email'))->get();
				$unnecessary5 = array('[', ']', '{', '}', '"', 'id:');
				$regid = str_replace($unnecessary5, '', $regid);

				DB::table('personal_registration')->where('email', $request->input('email'))->update([
					'token'=> $token,
					'updated_at'=> now()
				]);
				
				/*return DB::table('personal_registration')
						->join('personal', 'personal_registration.id', '=', 'personal.regid')
						->select('personal_registration.id', 'personal_registration.token', 'personal_registration.email',
								 'personal.personalname as name', 'personal.birthlocation', 'personal.dob', 'personal.gender', 
								 'personal.ethnic','personal.religion', 'personal.marital', 'personal.idtype', 
								 'personal.idno', 'personal.candidateno', 'personal_registration.created_at as registered_on')
						->where('personal_registration.email', $request->input('email'))
						->orderby('id', 'desc')
						->limit(1)
						->get();*/	
				
				$formaledu = DB::table('formal_edu_header')->select('id')->where('regid', $regid)->get();
				$psychotest = DB::table('psycho_result')->select('id')->where('regid', $regid)->get();
				$personaltest = DB::table('personal_test')->select('id')->where('regid', $regid)->get();
				$uploadktp = DB::table('personal_uploads')->select('id')->where('title', 'KTP')->where('regid', $regid)->get();	
					
				if($formaledu == '[]' || $psychotest == '[]' || $personaltest == '[]' || $uploadktp == '[]')
				{
					$eligibletoapply  = 'no';
					$uploadktp2 = 'no';
				}
				else
				{
					$eligibletoapply  = 'yes';
					$uploadktp2 = 'yes';
				}
				
				//http://joblink.adnet.id/uploads/1_201811001_profile.jpeg
				$query = "SELECT personal_registration.id,  
						personal.regid, 
						personal_registration.token, 
						personal_registration.email, 
						personal.personalname, 
						personal.birthlocation, 
						personal.dob, 
						personal.ethnic, 
						personal.address, 
						personal.idtype, 
						personal.idno, 
						personal.address, 
						personal.gender, 
						personal.marital, 
						personal.candidateno,
						personal.religion, 

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"eduid":"'."', IFNULL(formal_edu_header.id, ''), '".'",'."',    
						'".'"edulevel":"'."', IFNULL(formal_edu_header.edulevel, ''), '".'",'."',
						'".'"startyear":"'."', IFNULL(formal_edu_header.startyear, ''), '".'",'."',
						'".'"endyear":"'."', IFNULL(formal_edu_header.endyear, ''), '".'",'."',
						'".'"faculty":"'."', IFNULL(formal_edu_header.faculty, ''), '".'",'."',
						'".'"major":"'."', IFNULL(formal_edu_header.major, ''), '".'",'."',
						'".'"title":"'."', IFNULL(formal_edu_header.title, ''), '".'",'."',
						'".'"gpa":"'."', IFNULL(formal_edu_header.lastgpa, ''), '".'",'."',
						'".'"institutionname":"'."', IFNULL(formal_edu_header.institution_name, ''), '".'",'."',
						'".'"institutionloc":"'."', IFNULL(formal_edu_header.institution_location, ''), '".'",'."',
						'".'"note":"'."', IFNULL(formal_edu_header.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_header
						WHERE formal_edu_header.regid = personal_registration.id) as formaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"gpaid":"'."', IFNULL(formal_edu_header.id, ''), '".'",'."',
						'".'"edulevel":"'."', IFNULL(formal_edu_header.edulevel, ''), '".'",'."',
						'".'"major":"'."', IFNULL(formal_edu_header.major, ''), '".'",'."',
						'".'"year":"'."', IFNULL(formal_edu_header.startyear, ''), '".'",'."',
						'".'"gpa":"'."', IFNULL(formal_edu_header.lastgpa, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_header
						WHERE formal_edu_header.regid = personal_registration.id) as gpa,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"nonfrid":"'."', IFNULL(nonformal_edu.id, ''), '".'",'."',    
						'".'"institutionname":"'."', IFNULL(nonformal_edu.institution_name, ''), '".'",'."',
						'".'"major":"'."', IFNULL(nonformal_edu.major, ''), '".'",'."',
						'".'"startperiod":"'."', IFNULL(nonformal_edu.startperiod, ''), '".'",'."',
						'".'"endperiod":"'."', IFNULL(nonformal_edu.endperiod, ''), '".'",'."',
						'".'"studyfield":"'."', IFNULL(nonformal_edu.study_field, ''), '".'",'."',
						'".'"location":"'."', IFNULL(nonformal_edu.location, ''), '".'",'."',
						'".'"note":"'."', IFNULL(nonformal_edu.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM nonformal_edu
						WHERE nonformal_edu.regid = personal_registration.id) as nonformaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"langid":"'."', IFNULL(personal_langs.id, ''), '".'",'."',
						'".'"langname":"'."', IFNULL(personal_langs.langname, ''), '".'",'."',
						'".'"langlevel":"'."', IFNULL(personal_langs.langlevel, ''), '".'",'."',
						'".'"note":"'."', IFNULL(personal_langs.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_langs
						WHERE personal_langs.regid = personal_registration.id) as languages,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"expid":"'."', IFNULL(personal_experiences.id, ''), '".'",'."',    
						'".'"workplacename":"'."', IFNULL(personal_experiences.workplacename, ''), '".'",'."',
						'".'"workplaceloc":"'."', IFNULL(personal_experiences.workplaceloc, ''), '".'",'."',
						'".'"startperiod":"'."', IFNULL(personal_experiences.startperiod, ''), '".'",'."',
						'".'"endperiod":"'."', IFNULL(personal_experiences.endperiod, ''), '".'",'."',
						'".'"status":"'."', IFNULL(personal_experiences.status, ''), '".'",'."',
						'".'"jobname":"'."', IFNULL(personal_experiences.jobname, ''), '".'",'."',
						'".'"jobdesc":"'."', IFNULL(personal_experiences.jobdesc, ''), '".'",'."',
						'".'"salary":"'."', IFNULL(personal_experiences.salary, ''), '".'",'."',
						'".'"note":"'."', IFNULL(personal_experiences.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_experiences
						WHERE personal_experiences.regid = personal_registration.id) as experiences,

						IFNULL((SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"infoid":"'."', IFNULL(personal_factors.id, ''), '".'",'."',    
						'".'"factor":"'."', IFNULL(personal_factors.factor, ''), '".'",'."',
						'".'"lastjob":"'."', IFNULL(personal_factors.lastjob, ''), '".'",'."',
						'".'"additional":"'."', IFNULL(personal_factors.additional, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_factors
						WHERE personal_factors.regid = personal_registration.id), '[{".'"infoid"'.":null,".'"factor"'.":null,".'"lastjob"'.":null,".'"additional"'.":null}]') 
						as additionalinfos,
						
						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"uploadid":"'."', IFNULL(personal_uploads.id, ''), '".'",'."',    
						'".'"title":"'."', IFNULL(personal_uploads.title, ''), '".'",'."',
						'".'"uploaded_at":"'."', IFNULL(IFNULL(personal_uploads.updated_at, personal_uploads.created_at), ''), '".'",'."',
						'".'"photo":"'."', SUBSTRING_INDEX(IFNULL(photourl, ''), '/', -1 ), '".'",'."',
						'".'"photourl":"'."', IFNULL(CONCAT('http://joblink.adnet.id/', personal_uploads.photourl), ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_uploads
						WHERE personal_uploads.regid = personal_registration.id) as uploads,
						
						(SELECT psycho_result.id FROM psycho_result WHERE psycho_result.regid=".$regid.") as psychotestid,
						
						(SELECT personal_test.id FROM personal_test WHERE personal_test.regid=".$regid.") as personaltestid,
						
						(SELECT '".$eligibletoapply."') as eligibletoapply,
						
						(SELECT '".$uploadktp2."') as uploadktp
						
						FROM personal_registration 
						LEFT JOIN personal ON personal_registration.id = personal.regid
						WHERE personal_registration.email='".$request->input('email')."';";

				$res=DB::select($query);

				$res = array_values($res);
				$res = json_encode($res);
				
				$res=str_replace('"[{','[{',$res);
				$res=str_replace('}]"','}]',$res);
				$res=str_replace('\"','"',$res);
				$res=str_replace('\/','/',$res);
				
				http_response_code(200);
				
				header("Content-type: application/json");
				return $res;
			}
			
		}
	}
	
	public function refresh(Request $request)
	{
		date_default_timezone_set("Asia/Jakarta");
		
		$checkid = DB::table('personal_registration')->select('id')->where('id', $_GET['id'])->get();
		
		if($checkid == '[]')
		{
			echo '[{"message":"Data not found!"}]';
			http_response_code(404);
			die();
		}
		else
		{
			$formaledu = DB::table('formal_edu_header')->select('id')->where('regid', $_GET['id'])->get();
			$psychotest = DB::table('psycho_result')->select('id')->where('regid', $_GET['id'])->get();
			$personaltest = DB::table('personal_test')->select('id')->where('regid', $_GET['id'])->get();
			$uploadktp = DB::table('personal_uploads')->select('id')->where('title', 'KTP')->where('regid', $_GET['id'])->get();
			
			if($formaledu == '[]' || $psychotest == '[]' || $personaltest == '[]' || $uploadktp == '[]')
			{
				$eligibletoapply  = 'no';
				$uploadktp2 = 'no';
			}
			else
			{
				$eligibletoapply  = 'yes';
				$uploadktp2 = 'yes';
			}
		
			$query = "SELECT personal_registration.id,  
						personal.regid, 
						personal_registration.token, 
						personal_registration.email,
						personal.personalname, 
						personal.birthlocation, 
						personal.dob, 
						personal.ethnic, 
						personal.address, 
						personal.idtype, 
						personal.idno, 
						personal.address, 
						personal.gender, 
						personal.marital, 
						personal.candidateno,
						personal.religion, 
						personal.candidateno,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"eduid":"'."', IFNULL(formal_edu_header.id, ''), '".'",'."',    
						'".'"edulevel":"'."', IFNULL(formal_edu_header.edulevel, ''), '".'",'."',
						'".'"startyear":"'."', IFNULL(formal_edu_header.startyear, ''), '".'",'."',
						'".'"endyear":"'."', IFNULL(formal_edu_header.endyear, ''), '".'",'."',
						'".'"faculty":"'."', IFNULL(formal_edu_header.faculty, ''), '".'",'."',
						'".'"major":"'."', IFNULL(formal_edu_header.major, ''), '".'",'."',
						'".'"title":"'."', IFNULL(formal_edu_header.title, ''), '".'",'."',
						'".'"gpa":"'."', IFNULL(formal_edu_header.lastgpa, ''), '".'",'."',
						'".'"institutionname":"'."', IFNULL(formal_edu_header.institution_name, ''), '".'",'."',
						'".'"institutionloc":"'."', IFNULL(formal_edu_header.institution_location, ''), '".'",'."',
						'".'"note":"'."', IFNULL(formal_edu_header.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_header
						WHERE formal_edu_header.regid = personal_registration.id) as formaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"gpaid":"'."', IFNULL(formal_edu_header.id, ''), '".'",'."',
						'".'"edulevel":"'."', IFNULL(formal_edu_header.edulevel, ''), '".'",'."',
						'".'"major":"'."', IFNULL(formal_edu_header.major, ''), '".'",'."',
						'".'"year":"'."', IFNULL(formal_edu_header.startyear, ''), '".'",'."',
						'".'"gpa":"'."', IFNULL(formal_edu_header.lastgpa, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_header
						WHERE formal_edu_header.regid = personal_registration.id) as gpa,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"nonfrid":"'."', IFNULL(nonformal_edu.id, ''), '".'",'."',    
						'".'"institutionname":"'."', IFNULL(nonformal_edu.institution_name, ''), '".'",'."',
						'".'"major":"'."', IFNULL(nonformal_edu.major, ''), '".'",'."',
						'".'"startperiod":"'."', IFNULL(nonformal_edu.startperiod, ''), '".'",'."',
						'".'"endperiod":"'."', IFNULL(nonformal_edu.endperiod, ''), '".'",'."',
						'".'"studyfield":"'."', IFNULL(nonformal_edu.study_field, ''), '".'",'."',
						'".'"location":"'."', IFNULL(nonformal_edu.location, ''), '".'",'."',
						'".'"note":"'."', IFNULL(nonformal_edu.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM nonformal_edu
						WHERE nonformal_edu.regid = personal_registration.id) as nonformaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"langid":"'."', IFNULL(personal_langs.id, ''), '".'",'."',
						'".'"langname":"'."', IFNULL(personal_langs.langname, ''), '".'",'."',
						'".'"langlevel":"'."', IFNULL(personal_langs.langlevel, ''), '".'",'."',
						'".'"note":"'."', IFNULL(personal_langs.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_langs
						WHERE personal_langs.regid = personal_registration.id) as languages,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"expid":"'."', IFNULL(personal_experiences.id, ''), '".'",'."',    
						'".'"workplacename":"'."', IFNULL(personal_experiences.workplacename, ''), '".'",'."',
						'".'"workplaceloc":"'."', IFNULL(personal_experiences.workplaceloc, ''), '".'",'."',
						'".'"startperiod":"'."', IFNULL(personal_experiences.startperiod, ''), '".'",'."',
						'".'"endperiod":"'."', IFNULL(personal_experiences.endperiod, ''), '".'",'."',
						'".'"status":"'."', IFNULL(personal_experiences.status, ''), '".'",'."',
						'".'"jobname":"'."', IFNULL(personal_experiences.jobname, ''), '".'",'."',
						'".'"jobdesc":"'."', IFNULL(personal_experiences.jobdesc, ''), '".'",'."',
						'".'"salary":"'."', IFNULL(personal_experiences.salary, ''), '".'",'."',
						'".'"note":"'."', IFNULL(personal_experiences.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_experiences
						WHERE personal_experiences.regid = personal_registration.id) as experiences,

						IFNULL((SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"infoid":"'."', IFNULL(personal_factors.id, ''), '".'",'."',    
						'".'"factor":"'."', IFNULL(personal_factors.factor, ''), '".'",'."',
						'".'"lastjob":"'."', IFNULL(personal_factors.lastjob, ''), '".'",'."',
						'".'"additional":"'."', IFNULL(personal_factors.additional, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_factors
						WHERE personal_factors.regid = personal_registration.id), '[{".'"infoid"'.":null,".'"factor"'.":null,".'"lastjob"'.":null,".'"additional"'.":null}]') as additionalinfos,
						
						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"uploadid":"'."', IFNULL(personal_uploads.id, ''), '".'",'."',    
						'".'"title":"'."', IFNULL(personal_uploads.title, ''), '".'",'."',
						'".'"uploaded_at":"'."', IFNULL(IFNULL(personal_uploads.updated_at, personal_uploads.created_at), ''), '".'",'."',
						'".'"photo":"'."', SUBSTRING_INDEX(IFNULL(photourl, ''), '/', -1 ), '".'",'."',
						'".'"photourl":"'."', IFNULL(CONCAT('http://joblink.adnet.id/', personal_uploads.photourl), ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_uploads
						WHERE personal_uploads.regid = personal_registration.id) as uploads,
						
						(SELECT psycho_result.id FROM psycho_result WHERE psycho_result.regid=".$_GET['id'].") as psychotestid,
						
						(SELECT personal_test.id FROM personal_test WHERE personal_test.regid=".$_GET['id'].") as personaltestid,
						
						(SELECT '".$eligibletoapply."') as eligibletoapply,
						
						(SELECT '".$uploadktp2."') as uploadktp
						
						FROM personal_registration 
						LEFT JOIN personal ON personal_registration.id = personal.regid
						WHERE personal_registration.id=".$_GET['id'].";";
							
					$res=DB::select($query);

					$res = array_values($res);
					$res = json_encode($res);
					
					$res=str_replace('"[{','[{',$res);
					$res=str_replace('}]"','}]',$res);
					$res=str_replace('\"','"',$res);
					$res=str_replace('\/','/',$res);
					
					http_response_code(200);
					
					header("Content-type: application/json");
					return $res;
					
					/*
					(SELECT CONCAT('[' ,
					GROUP_CONCAT(
					'{".'"gpaid":"'."', IFNULL(formal_edu_gpa.id, ''), '".'",'."',
					'".'"edulevel":"'."', IFNULL(formal_edu_gpa.edulevel, ''), '".'",'."',
					'".'"major":"'."', IFNULL(formal_edu_gpa.major, ''), '".'",'."',
					'".'"year":"'."', IFNULL(formal_edu_gpa.year, ''), '".'",'."',
					'".'"gpa":"'."', IFNULL(formal_edu_gpa.gpa, ''), '".'"}'."'
					SEPARATOR ','), ']')
					FROM formal_edu_gpa
					WHERE formal_edu_gpa.regid = personal_registration.id) as gpa,
					*/
		}
	}
}

?>