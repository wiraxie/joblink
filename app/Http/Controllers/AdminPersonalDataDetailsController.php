<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;

	class AdminPersonalDataDetailsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			header("Cache-Control: no-cache, must-revalidate");
		
			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "personalname";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = true;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "personal";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];

			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Regid","name"=>"regid","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Personalname","name"=>"personalname","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Birthlocation","name"=>"birthlocation","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Dob","name"=>"dob","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
			//$this->form[] = ["label"=>"Ethnic","name"=>"ethnic","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Address","name"=>"address","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Idtype","name"=>"idtype","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Idno","name"=>"idno","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Gender","name"=>"gender","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Marital","name"=>"marital","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Religion","name"=>"religion","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Candidateno","name"=>"candidateno","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Position","name"=>"position","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Photourl","name"=>"photourl","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Ktpurl","name"=>"ktpurl","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Aktelahirurl","name"=>"aktelahirurl","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Ijazahurl","name"=>"ijazahurl","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Other Upload 1","name"=>"other_upload_1","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Other Upload 2","name"=>"other_upload_2","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Gpa","name"=>"gpa","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Formal","name"=>"formal","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Nonformal","name"=>"nonformal","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Languages","name"=>"languages","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Experience","name"=>"experience","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Jobs","name"=>"jobs","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Factor","name"=>"factor","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Other Information","name"=>"other_information","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
			$regid2 = DB::table('personal')->select('regid')->where('id', $_GET['id'])->get();
			$buangarray = array('[', ']', '{', '}', '"', 'regid:');
			$regid2 = str_replace($buangarray, '', $regid2);
			
			
			$query = "SELECT personal.id,
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
						personal.created_at,
						(SELECT CONCAT('http://joblink.adnet.id/', personal_uploads.photourl) FROM personal_uploads WHERE regid=".$regid2." AND title='Profile' LIMIT 1)as picture,
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
						WHERE psycho_result_score.regid=personal.regid
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
						WHERE personal_test_score.regid=personal.regid
						GROUP BY personal_test_score.regid), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_test_score
						WHERE personal_test_score.regid = personal_registration.id) as personaltestdetails,
						
						(SELECT CONCAT('[' ,
						GROUP_CONCAT(
						'{".'"uploadid":"'."', IFNULL(personal_uploads.id, ''), '".'",'."',    
						'".'"title":"'."', IFNULL(personal_uploads.title, ''), '".'",'."',
						'".'"photourl":"'."', IFNULL(CONCAT('http://joblink.adnet.id/', personal_uploads.photourl), ''), '".'"}'."'
						SEPARATOR ','), ']')
						FROM personal_uploads
						WHERE personal_uploads.regid = personal_registration.id) as uploads,
						
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
						
						FROM personal
						LEFT JOIN personal_registration ON personal.regid = personal_registration.id
						LEFT JOIN psycho_result ON personal.regid = psycho_result.regid
						LEFT JOIN personal_test ON personal.regid = personal_test.regid
						WHERE personal.id=".$_GET['id'].";";
		
			$res=DB::select($query);

			$res = array_values($res);
			$res = json_encode($res);
			$res = json_decode($res, TRUE);
			
			$data = [];
			$data['page_title'] = 'Data';
			$data['row'] = $res; 

			//$uploads = json_decode($res[0]['uploads'], TRUE);
			//echo $uploads[0]['photourl'];

			return $this->cbView('personaldatadetails', $data);
		}
	    //By the way, you can still create your own method in here... :) 


	}