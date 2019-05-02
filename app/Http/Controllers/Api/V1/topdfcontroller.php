<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use PDF;

class topdfcontroller extends Controller
{
  public function export_pdf(Request $request)
  {
	 $regid = DB::table('applicants')->select('regid')->where('id', $_GET['id'])->get();
	 $unnecessary1 = array('[', ']', '{', '}', '"', 'regid:');
	 $regid = str_replace($unnecessary1, '', $regid);
	 
	 $candidateno = DB::table('personal')->select('candidateno')->where('regid', $regid)->get();
	 $unnecessary2 = array('[', ']', '{', '}', '"', 'candidateno:');
	 $candidateno = str_replace($unnecessary2, '', $candidateno);
	  
	 $jobid = DB::table('applicants')->select('jobid')->where('id', $_GET['id'])->get();
	 $unnecessary3 = array('[', ']', '{', '}', '"', 'jobid:');
	 $jobid = str_replace($unnecessary3, '', $jobid);
	 
	 $position = DB::table('jobs_update')->select('position')->where('id', $jobid)->get();
	 $unnecessary4 = array('[', ']', '{', '}', '"', 'position:');
	 $position = str_replace($unnecessary4, '', $position);
	 
	 $companyid = DB::table('jobs_update')->select('companyid')->where('id', $_GET['id'])->get();
	 $unnecessary5 = array('[', ']', '{', '}', '"', 'companyid:');
	 $companyid = str_replace($unnecessary5, '', $companyid);
	 
	 $comname = DB::table('companies')->select('comname')->where('id', $companyid)->get();
	 $unnecessary6 = array('[', ']', '{', '}', '"', 'comname:');
	 $comname = str_replace($unnecessary6, '', $comname);
	  
	 $query = "SELECT applicants.id, 
						applicants.regid, 
						applicants.appdate,
						applicants.status,
						jobs_update.position,
						jobs_update.companyid,
						companies.comname,
						personal.personalname,
						personal.birthlocation,
						personal.dob,
						personal.ethnic,
						personal.address,
						personal.idtype,
						personal.idno,
						personal.gender,
						personal.marital,
						personal.candidateno,
						personal.religion,
					
						(SELECT CONCAT('http://joblink.adnet.id/', personal_uploads.photourl) from personal_uploads
						WHERE title='profile' and personal_uploads.regid=personal_registration.id) 
						AS photourl,
						
						psycho_result.testdate as psychotestdate,
						psycho_result.totaltime as psychotestduration,
						psycho_result.totalscore as psychotesttotalscore,
						personal_test.testdate as personaltestdate,
						personal_test.totaltime as personaltestduration,
						personal_test.totalscore as personaltesttotalscore,
						
						
						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"eduid"			:"'."', IFNULL(formal_edu_header.id, ''), '".'",'."',    
						'".'"edulevel"			:"'."', IFNULL(formal_edu_header.edulevel, ''), '".'",'."',
						'".'"startyear"			:"'."', IFNULL(formal_edu_header.startyear, ''), '".'",'."',
						'".'"endyear"			:"'."', IFNULL(formal_edu_header.endyear, ''), '".'",'."',
						'".'"faculty"			:"'."', IFNULL(formal_edu_header.faculty, ''), '".'",'."',
						'".'"major"				:"'."', IFNULL(formal_edu_header.major, ''), '".'",'."',
						'".'"gpa"				:"'."', IFNULL(formal_edu_header.lastgpa, ''), '".'",'."',
						'".'"title"				:"'."', IFNULL(formal_edu_header.title, ''), '".'",'."',
						'".'"institutionname"	:"'."', IFNULL(formal_edu_header.institution_name, ''), '".'",'."',
						'".'"institutionloc"	:"'."', IFNULL(formal_edu_header.institution_location, ''), '".'",'."',
						'".'"note":"'."', IFNULL(formal_edu_header.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_header
						WHERE formal_edu_header.regid = personal_registration.id) as formaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"gpaid"			:"'."', IFNULL(formal_edu_gpa.id, ''), '".'",'."',
						'".'"edulevel"			:"'."', IFNULL(formal_edu_gpa.edulevel, ''), '".'",'."',
						'".'"major"				:"'."', IFNULL(formal_edu_gpa.major, ''), '".'",'."',
						'".'"year"				:"'."', IFNULL(formal_edu_gpa.year, ''), '".'",'."',
						'".'"gpa"				:"'."', IFNULL(formal_edu_gpa.gpa, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM formal_edu_gpa
						WHERE formal_edu_gpa.regid = personal_registration.id) as gpa,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"nonfrid"			:"'."', IFNULL(nonformal_edu.id, ''), '".'",'."',    
						'".'"institutionname"	:"'."', IFNULL(nonformal_edu.institution_name, ''), '".'",'."',
						'".'"major"				:"'."', IFNULL(nonformal_edu.major, ''), '".'",'."',
						'".'"startperiod"		:"'."', IFNULL(nonformal_edu.startperiod, ''), '".'",'."',
						'".'"endperiod"			:"'."', IFNULL(nonformal_edu.endperiod, ''), '".'",'."',
						'".'"studyfield"		:"'."', IFNULL(nonformal_edu.study_field, ''), '".'",'."',
						'".'"location"			:"'."', IFNULL(nonformal_edu.location, ''), '".'",'."',
						'".'"note"				:"'."', IFNULL(nonformal_edu.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM nonformal_edu
						WHERE nonformal_edu.regid = personal_registration.id) as nonformaleducation,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"langid"			:"'."', IFNULL(personal_langs.id, ''), '".'",'."',
						'".'"langname"			:"'."', IFNULL(personal_langs.langname, ''), '".'",'."',
						'".'"langlevel"			:"'."', IFNULL(personal_langs.langlevel, ''), '".'",'."',
						'".'"note"				:"'."', IFNULL(personal_langs.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_langs
						WHERE personal_langs.regid = personal_registration.id) as languages,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"expid"			:"'."', IFNULL(personal_experiences.id, ''), '".'",'."',    
						'".'"workplacename"		:"'."', IFNULL(personal_experiences.workplacename, ''), '".'",'."',
						'".'"workplaceloc"		:"'."', IFNULL(personal_experiences.workplaceloc, ''), '".'",'."',
						'".'"startperiod"		:"'."', IFNULL(personal_experiences.startperiod, ''), '".'",'."',
						'".'"endperiod"			:"'."', IFNULL(personal_experiences.endperiod, ''), '".'",'."',
						'".'"status"			:"'."', IFNULL(personal_experiences.status, ''), '".'",'."',
						'".'"jobname"			:"'."', IFNULL(personal_experiences.jobname, ''), '".'",'."',
						'".'"jobdesc"			:"'."', IFNULL(personal_experiences.jobdesc, ''), '".'",'."',
						'".'"salary"			:"'."', IFNULL(personal_experiences.salary, ''), '".'",'."',
						'".'"note"				:"'."', IFNULL(personal_experiences.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_experiences
						WHERE personal_experiences.regid = personal_registration.id) as experiences,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"infoid"			:"'."', IFNULL(personal_factors.id, ''), '".'",'."',    
						'".'"factor"			:"'."', IFNULL(personal_factors.factor, ''), '".'",'."',
						'".'"lastjob"			:"'."', IFNULL(personal_factors.lastjob, ''), '".'",'."',
						'".'"additional"		:"'."', IFNULL(personal_factors.additional, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_factors
						WHERE personal_factors.regid = personal_registration.id) as additionalinfos,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"psychotestid"		:"'."', IFNULL(psycho_result_score.presultid, ''), '".'",'."',							
						'".'"testtype"			:"'."', IFNULL(psycho_result_score.ptype, ''), '".'",'."',
						'".'"correct_answers"	:"'."', IFNULL(psycho_result_score.correct_answers, ''), '".'",'."',
						'".'"score"				:"'."', IFNULL(psycho_result_score.score, ''), '".'",'."',
						'".'"totalscore"		:"'."', (SELECT SUM(psycho_result_score.score) 
						FROM psycho_result_score
						WHERE psycho_result_score.regid=applicants.regid
						GROUP BY psycho_result_score.regid), '".'"}'."'
						SEPARATOR ','), ']')
						FROM psycho_result_score
						WHERE psycho_result_score.regid = personal_registration.id) as psychotestdetails,

						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"personaltestid"	:"'."', IFNULL(personal_test_score.id, ''), '".'",'."',    
						'".'"testtype"			:"'."', IFNULL(personal_test_score.ptype, ''), '".'",'."',
						'".'"correct_answers"	:"'."', IFNULL(personal_test_score.correct_answers, ''), '".'",'."',
						'".'"score"				:"'."', IFNULL(personal_test_score.score, ''), '".'",'."',
						'".'"totalscore"		:"'."', (SELECT SUM(personal_test_score.score) 
						FROM personal_test_score 
						WHERE personal_test_score.regid=applicants.regid
						GROUP BY personal_test_score.regid), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_test_score
						WHERE personal_test_score.regid = personal_registration.id) as personaltestdetails,
						
						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"intid"			:"'."', IFNULL(interview_result.id, ''), '".'",'."',    
						'".'"intcode"		:"'."', IFNULL(interview_result.intcode, ''), '".'",'."',
						'".'"intdate"		:"'."', IFNULL(interview_result.intdate, ''), '".'",'."',
						'".'"duduk"		:"'."', IFNULL(interview_result.sikap_duduk, ''), '".'",'."',
						'".'"bicara"			:"'."', IFNULL(interview_result.sikap_berbicara, ''), '".'",'."',
						'".'"pandang"			:"'."', IFNULL(interview_result.cara_pandang_job, ''), '".'",'."',
						'".'"pengetahuan"			:"'."', IFNULL(interview_result.pengetahuan, ''), '".'",'."',
						'".'"pemahaman"			:"'."', IFNULL(interview_result.pemahaman_job, ''), '".'",'."',
						'".'"loyal"			:"'."', IFNULL(interview_result.loyalitas, ''), '".'",'."',
						'".'"other"			:"'."', IFNULL(interview_result.other, ''), '".'",'."',
						'".'"note"				:"'."', IFNULL(interview_result.note, ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM interview_result
						WHERE interview_result.regid = personal_registration.id) as interviewdetails

						FROM applicants
						LEFT JOIN personal_registration ON applicants.regid = personal_registration.id
						LEFT JOIN jobs_update ON applicants.jobid = jobs_update.id
						LEFT JOIN companies ON jobs_update.companyid = companies.id
						LEFT JOIN personal ON applicants.regid = personal.regid
						LEFT JOIN psycho_result ON applicants.regid = psycho_result.regid
						LEFT JOIN personal_test ON applicants.regid = personal_test.regid
						WHERE applicants.id=".$_GET['id'].";";
		
			$res=DB::select($query);

			$res = array_values($res);
			$res = json_encode($res);
			$res = json_decode($res, TRUE);
			//print_r($res);die();
			//echo 'ini formal: '.$res[0]['formaleducation'];die();
			
			$pdf = PDF::loadView('pdf', compact('res'));
			//$pdf->save(storage_path().'/files/'.$candidateno.'_'.$position.'_'.$comname.'.pdf'); 
			return $pdf->download($candidateno.'_'.$position.'_'.$comname.'.pdf'); 
  }
  
  /* function lama
  public function export_pdf(Request $request)
  {	  
	//echo $request->query('id');die();
  
	$data = [];
	$data['page_title'] = 'Data';
	$data['row'] = DB::table('applicants')
		  ->leftJoin('personal', 'applicants.regid', '=', 'personal.regid')
		  ->leftJoin('formal_edu_header', 'applicants.regid', '=', 'formal_edu_header.regid')
		  ->leftJoin('nonformal_edu', 'applicants.regid', '=', 'nonformal_edu.regid')
		  ->leftJoin('formal_edu_gpa', 'applicants.regid', '=', 'formal_edu_gpa.regid')
          ->leftJoin('jobs_update', 'applicants.jobid', '=', 'jobs_update.id')
		  ->leftJoin('psycho_result', 'applicants.regid', '=', 'psycho_result.regid')
		  ->leftJoin('psycho_result_score', 'applicants.regid', '=', 'psycho_result_score.regid')
          ->select( 'applicants.regid',
					'applicants.regid as id',
					'personal.personalname as name', 
					'jobs_update.position', 
					'applicants.appdate',
					
					'personal.candidateno',
					'personal.photourl',
					'personal.birthlocation',
					'personal.dob',
					'personal.ethnic',
					'personal.address',
					'personal.idtype',
					'personal.idno',
					'personal.gender',
					'personal.marital',
					'personal.religion',
					
					'formal_edu_header.edulevel as formaledulevel',
					'formal_edu_header.startyear as formalstartyear',
					'formal_edu_header.endyear as formalendyear',
					'formal_edu_header.faculty as formalfaculty',
					'formal_edu_header.major as formalmajor',
					'formal_edu_header.institution_name as formalinstname',
					
					'nonformal_edu.institution_name as nonfrinstname',
					'nonformal_edu.major as nonfrmajor',
					'nonformal_edu.study_field as nonfrstudy',
					'nonformal_edu.startperiod as nonfrstart',
					'nonformal_edu.endperiod as nonfrend',
					
					'formal_edu_gpa.edulevel as gpaedulevel',
					'formal_edu_gpa.year as gpayear',
					'formal_edu_gpa.major as gpamajor',
					'formal_edu_gpa.gpa',
					
					'psycho_result.testdate',
					'psycho_result.totaltime',
					'psycho_result.totalscore',
					'psycho_result_score.ptype',
					'psycho_result_score.correct_answers',
					'psycho_result_score.score')
		  ->where('applicants.id', $_GET['id'])->first();
		  
		  
    $pdf = PDF::loadView('pdf', $data);
	$pdf->save(storage_path().'_filename.pdf');
    return $pdf->download('file.pdf');
  }*/
}