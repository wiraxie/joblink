<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiPsychotestController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "psycho_result";        
				$this->permalink   = "psychotest";    
				$this->method_type = "post";    
		    }
		

		    public function hook_before(&$postdata) 
			{
		        //This method will be execute before run the main process
				
				//echo DB::getPdo()->lastInsertId();die();
				
				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$id = Request::get('id');
				
				$duration = Request::get('duration');
				
				$checkregid = DB::table('personal_registration')->where('id', $id)->get();
				
				$checkregid2 = DB::table('psycho_result')->where('regid', $id)->get();

				if($checkregid == '[]')
				{
					echo '[{"message":"data tidak ditemukan!"}]';
					http_response_code(404);
					die();
				}
				elseif($checkregid2 != '[]')
				{
					echo '[{"message":"already took test"}]';
					http_response_code(406);
					die();
				}
				else
				{	
					DB::table('psycho_result')->insert([
						'regid'=> $id,
						'totaltime'=> $duration,
						'testdate'=> now(),
						'created_at'=> now()
					]);
					
					$gettestid = DB::table('psycho_result')->select('id')->where('regid', $id)->get();
					$unnecessary = array('[', ']', '{', '}', '"', 'id:');
					$gettestid = str_replace($unnecessary, '', $gettestid);
					
					//echo $gettestid;die();
					
					$answer1 =Request::get('answer1');
					$answer2 =Request::get('answer2');
					$answer3 =Request::get('answer3');
					$answer4 =Request::get('answer4');
					$answer5 =Request::get('answer5');
					$answer6 =Request::get('answer6');
					$answer7 =Request::get('answer7');
					$answer8 =Request::get('answer8');
					$answer9 =Request::get('answer9');
					$answer10 =Request::get('answer10');
					$answer11 =Request::get('answer11');
					$answer12 =Request::get('answer12');
					$answer13 =Request::get('answer13');
					$answer14 =Request::get('answer14');
					$answer15 =Request::get('answer15');
					$answer16 =Request::get('answer16');
					$answer17 =Request::get('answer17');
					$answer18 =Request::get('answer18');
					$answer19 =Request::get('answer19');
					$answer20 =Request::get('answer20');
					$answer21 =Request::get('answer21');
					$answer22 =Request::get('answer22');
					$answer23 =Request::get('answer23');
					$answer24 =Request::get('answer24');
					$answer25 =Request::get('answer25');
					$answer26 =Request::get('answer26');
					$answer27 =Request::get('answer27');
					$answer28 =Request::get('answer28');
					$answer29 =Request::get('answer29');
					$answer30 =Request::get('answer30');
					$answer31 =Request::get('answer31');
					$answer32 =Request::get('answer32');
					
					$status = 'Answered';
					
					//Analitik------------------------------------------------------------------//
					if($answer1 == null || $answer1 == '' || $answer1 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Analitik',
							'answer'=> $answer1,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Analitik',
							'answer'=> $answer1,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer2 == null || $answer2 == '' || $answer2 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Analitik',
							'answer'=> $answer2,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Analitik',
							'answer'=> $answer2,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer3 == null || $answer3 == '' || $answer3 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Analitik',
							'answer'=> $answer3,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Analitik',
							'answer'=> $answer3,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer4 == null || $answer4 == '' || $answer4 != 'd')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Analitik',
							'answer'=> $answer4,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Analitik',
							'answer'=> $answer4,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer5 == null || $answer5 == '' || $answer5 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Analitik',
							'answer'=> $answer5,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Analitik',
							'answer'=> $answer5,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer6 == null || $answer6 == '' || $answer6 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Analitik',
							'answer'=> $answer6,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Analitik',
							'answer'=> $answer6,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer7 == null || $answer7 == '' || $answer7 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Analitik',
							'answer'=> $answer7,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Analitik',
							'answer'=> $answer7,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer8 == null || $answer8 == '' || $answer8 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Analitik',
							'answer'=> $answer8,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Analitik',
							'answer'=> $answer8,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer9 == null || $answer9 == '' || $answer9 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Analitik',
							'answer'=> $answer9,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Analitik',
							'answer'=> $answer9,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer10 == null || $answer10 == '' || $answer10 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Analitik',
							'answer'=> $answer10,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Analitik',
							'answer'=> $answer10,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//Ketelitian------------------------------------------------------------------//
					if($answer11 == null || $answer11 == '' || $answer11 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer11,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer11,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer12 == null || $answer12 == '' || $answer12 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer12,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer12,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer13 == null || $answer13 == '' || $answer13 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer13,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer13,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer14 == null || $answer14 == '' || $answer14 != 'd')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer13,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer14,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer15 == null || $answer15 == '' || $answer15 != 'd')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer13,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer15,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer16 == null || $answer16 == '' || $answer16 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer16,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer16,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer17 == null || $answer17 == '' || $answer17 != 's')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer17,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer17,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer18 == null || $answer18 == '' || $answer18 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer13,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer18,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer19 == null || $answer19 == '' || $answer19 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer19,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer19,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer20 == null || $answer20 == '' || $answer20 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer20,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer20,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer21 == null || $answer21 == '' || $answer21 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 11,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer21,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 11,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer21,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer22 == null || $answer22 == '' || $answer22 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 12,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer20,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 12,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer22,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer23 == null || $answer23 == '' || $answer23 != 's')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 13,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer23,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 13,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer23,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer24 == null || $answer24 == '' || $answer24 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 14,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer24,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 14,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer24,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer25 == null || $answer25 == '' || $answer25 != 't')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 15,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer23,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 15,
							'ptype'=> 'Ketelitian',
							'answer'=> $answer25,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//Penalaran------------------------------------------------------------------//
					if($answer26 == null || $answer26 == '' || $answer26 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Penalaran',
							'answer'=> $answer26,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Penalaran',
							'answer'=> $answer26,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer27 == null || $answer27 == '' || $answer27 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Penalaran',
							'answer'=> $answer27,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Penalaran',
							'answer'=> $answer27,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer28 == null || $answer28 == '' || $answer28 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Penalaran',
							'answer'=> $answer23,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Penalaran',
							'answer'=> $answer28,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer29 == null || $answer29 == '' || $answer29 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Penalaran',
							'answer'=> $answer29,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Penalaran',
							'answer'=> $answer29,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//Gambar------------------------------------------------------------------//
					if($answer30 == null || $answer30 == '' || $answer30 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Gambar',
							'answer'=> $answer30,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Gambar',
							'answer'=> $answer30,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer31 == null || $answer31 == '' || $answer31 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Gambar',
							'answer'=> $answer31,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Gambar',
							'answer'=> $answer31,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer32 == null || $answer32 == '' || $answer32 != 'e')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Gambar',
							'answer'=> $answer32,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('psycho_result_d')->insert([
							'presultid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Gambar',
							'answer'=> $answer32,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}				
					
					//analitik score------------------------------------------------------------------//					
					$analitik = DB::table('psycho_result_d')->where('regid', $id)
														    ->where('ptype', 'Analitik')
														    ->where('status', 'Answered')
															->count();
					
					if($analitik == 0 || $analitik < 1)
					{
						$analitikscore = 0;
					}
					elseif($analitik == 1)
					{
						$analitikscore = 50;
					}
					elseif($analitik == 2)
					{
						$analitikscore = 60;
					}
					elseif($analitik == 3)
					{
						$analitikscore = 65;
					}
					elseif($analitik == 4)
					{
						$analitikscore = 70;
					}
					elseif($analitik == 5)
					{
						$analitikscore = 75;
					}
					elseif($analitik == 6)
					{
						$analitikscore = 80;
					}
					elseif($analitik == 7)
					{
						$analitikscore = 85;
					}
					elseif($analitik == 8)
					{
						$analitikscore = 90;
					}
					elseif($analitik == 9)
					{
						$analitikscore = 95;
					}
					elseif($analitik == 10)
					{
						$analitikscore = 100;
					}
					
					DB::table('psycho_result_score')->insert([
						'presultid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Analitik',
						'correct_answers'=> $analitik,
						'score'=> $analitikscore,
						'created_at'=> now()
					]);
					//analitik score------------------------------------------------------------------//
					
					//ketelitian score------------------------------------------------------------------//					
					$ketelitian = DB::table('psycho_result_d')->where('regid', $id)
															  ->where('ptype', 'Ketelitian')
															  ->where('status', 'Answered')
															  ->count();
					
					if($ketelitian == 0 || $ketelitian < 1)
					{
						$ketelitianscore = 0;
					}
					elseif($ketelitian == 1)
					{
						$ketelitianscore = 30;
					}
					elseif($ketelitian == 2)
					{
						$ketelitianscore = 35;
					}
					elseif($ketelitian == 3)
					{
						$ketelitianscore = 40;
					}
					elseif($ketelitian == 4)
					{
						$ketelitianscore = 45;
					}
					elseif($ketelitian == 5)
					{
						$ketelitianscore = 50;
					}
					elseif($ketelitian == 6)
					{
						$ketelitianscore = 55;
					}
					elseif($ketelitian == 7)
					{
						$ketelitianscore = 60;
					}
					elseif($ketelitian == 8)
					{
						$ketelitianscore = 65;
					}
					elseif($ketelitian == 9)
					{
						$ketelitianscore = 70;
					}
					elseif($ketelitian == 10)
					{
						$ketelitianscore = 75;
					}
					elseif($ketelitian == 11)
					{
						$ketelitianscore = 80;
					}
					elseif($ketelitian == 12)
					{
						$ketelitianscore = 85;
					}
					elseif($ketelitian == 13)
					{
						$ketelitianscore = 90;
					}
					elseif($ketelitian == 14)
					{
						$ketelitianscore = 95;
					}
					elseif($ketelitian == 15)
					{
						$ketelitianscore = 100;
					}
					
					DB::table('psycho_result_score')->insert([
						'presultid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Ketelitian',
						'correct_answers'=> $ketelitian,
						'score'=> $ketelitianscore,
						'created_at'=> now()
					]);
					//ketelitian score------------------------------------------------------------------//
					
					//penalaran score------------------------------------------------------------------//
					$penalaran = DB::table('psycho_result_d')->where('regid', $id)
														     ->where('ptype', 'Penalaran')
														     ->where('status', 'Answered')
															 ->count();
					
					if($penalaran == 0 || $penalaran < 1)
					{
						$penalaranscore = 0;
					}
					elseif($penalaran == 1)
					{
						$penalaranscore = 70;
					}
					elseif($penalaran == 2)
					{
						$penalaranscore = 80;
					}
					elseif($penalaran == 3)
					{
						$penalaranscore = 90;
					}
					elseif($penalaran == 4)
					{
						$penalaranscore = 100;
					}
					
					DB::table('psycho_result_score')->insert([
						'presultid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Penalaran',
						'correct_answers'=> $penalaran,
						'score'=> $penalaranscore,
						'created_at'=> now()
					]);
					//penalaran score------------------------------------------------------------------//
					
					//gambar score------------------------------------------------------------------//
					$gambar = DB::table('psycho_result_d')->where('regid', $id)
														  ->where('ptype', 'Gambar')
														  ->where('status', 'Answered')
													      ->count();					
					
					if($gambar == 0 || $gambar < 1)
					{
						$gambarscore = 0;
					}
					elseif($gambar == 1)
					{
						$gambarscore = 70;
					}
					elseif($gambar == 2)
					{
						$gambarscore = 90;
					}
					elseif($gambar == 3)
					{
						$gambarscore = 100;
					}
					
					DB::table('psycho_result_score')->insert([
						'presultid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Gambar',
						'correct_answers'=> $gambar,
						'score'=> $gambarscore,
						'created_at'=> now()
					]);
					//gambar score------------------------------------------------------------------//
					
					//grand total score------------------------------------------------------------------//					
					$grandtotal = DB::table('psycho_result_score')->where('presultid', $gettestid)->sum('score');
					
					DB::table('psycho_result')->where('id', $gettestid)->update([
						'totalscore'=> $grandtotal,
						'updated_at'=>now()
					]);
					//grand total score------------------------------------------------------------------//
					
					echo '[{"message":"berhasil!"}]';
					http_response_code(200);
					die();
				}
				
		    }

		    public function hook_query(&$query) {
		        //This method is to customize the sql query

		    }

		    public function hook_after($postdata,&$result) {
		        //This method will be execute after run the main process

		    }

		}