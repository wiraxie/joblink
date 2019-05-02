<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	use PDF;
	
	class AdminApplicants20Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			header("Cache-Control: no-cache, must-revalidate");
		
			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "regid";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = false;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = false;
			$this->button_filter = false;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "applicants";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
	        */
	        $this->sub_module = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
	        */
	        $this->addaction = array();


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
	        */
	        $this->button_selected = array();

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
	        */
	        $this->index_button = array();



	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
	        */
	        $this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
	        */
	        $this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
	        */
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
	        */
	        $this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
	        */
	        $this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
	        */
	        $this->style_css = NULL;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
	        */
	        $this->load_css = array();
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	    */
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }

		public function getIndex() 
		{	
		  //echo $_GET['id'];die();
			
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
			
			$data = [];
			$data['page_title'] = 'Data';
			$data['row'] = $res; 

			/*$testobj = json_decode($row[0]['psychotestdetails'], TRUE);
			if(is_object($testarray))
			{
				echo'an obj';die();
			}
			elseif(!is_object($formal))
			{
				echo'not abj';die();
			}*/

			//return view('test', DB::table('applicants')->where('regid', $_GET['id'])::first());
			//return view('test', compact('data'));

			return $this->cbView('test', $data);
		  
		}
		
		/* function lama
		public function getIndex() 
		{	
		  //echo $_GET['id'];die();
			
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
		  
		  //return view('test', DB::table('applicants')->where('regid', $_GET['id'])::first());
		  //return view('test', compact('data'));
		  return $this->cbView('test', $data);
		  
		}*/

	  
	  
	    //By the way, you can still create your own method in here... :) 
	}