<?php namespace App\Http\Controllers;

		use Session;
		use Request;
		use DB;
		use CRUDBooster;

		class ApiPersonalitytestController extends \crocodicstudio\crudbooster\controllers\ApiController {

		    function __construct() {    
				$this->table       = "personal_test";        
				$this->permalink   = "personalitytest";    
				$this->method_type = "get";    
		    }
		

		    public function hook_before(&$postdata) {
		        //This method will be execute before run the main process

				header("Content-type: application/json");
				date_default_timezone_set("Asia/Jakarta");
				
				$id = Request::get('id');
				
				$duration = Request::get('duration');
				
				$checkregid = DB::table('personal_registration')->where('id', $id)->get();
				
				$checkregid2 = DB::table('personal_test')->where('regid', $id)->get();

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
					DB::table('personal_test')->insert([
						'regid'=> $id,
						'totaltime'=> $duration,
						'testdate'=> now(),
						'created_at'=> now()
					]);
					
					$gettestid = DB::table('personal_test')->select('id')->where('regid', $id)->get();
					$unnecessary = array('[', ']', '{', '}', '"', 'id:');
					$gettestid = str_replace($unnecessary, '', $gettestid);
					
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
					$answer33 =Request::get('answer33');
					$answer34 =Request::get('answer34');
					$answer35 =Request::get('answer35');
					$answer36 =Request::get('answer36');
					$answer37 =Request::get('answer37');
					$answer38 =Request::get('answer38');
					$answer39 =Request::get('answer39');
					$answer40 =Request::get('answer40');
					$answer41 =Request::get('answer41');
					$answer42 =Request::get('answer42');
					$answer43 =Request::get('answer43');
					$answer44 =Request::get('answer44');
					$answer45 =Request::get('answer45');
					
					$status = 'Answered';
					
					//Confidence------------------------------------------------------------------//
					if($answer1 == null || $answer1 == '' || $answer1 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Confidence',
							'answer'=> $answer1,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Confidence',
							'answer'=> $answer1,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer2 == null || $answer2 == '' || $answer2 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Confidence',
							'answer'=> $answer2,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Confidence',
							'answer'=> $answer2,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer3 == null || $answer3 == '' || $answer3 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Confidence',
							'answer'=> $answer3,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Confidence',
							'answer'=> $answer3,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer4 == null || $answer4 == '' || $answer4 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Confidence',
							'answer'=> $answer4,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Confidence',
							'answer'=> $answer4,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer5 == null || $answer5 == '' || $answer5 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Confidence',
							'answer'=> $answer5,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Confidence',
							'answer'=> $answer5,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer6 == null || $answer6 == '' || $answer6 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Confidence',
							'answer'=> $answer6,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Confidence',
							'answer'=> $answer6,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer7 == null || $answer7 == '' || $answer7 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Confidence',
							'answer'=> $answer7,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Confidence',
							'answer'=> $answer7,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer8 == null || $answer8 == '' || $answer8 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Confidence',
							'answer'=> $answer8,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Confidence',
							'answer'=> $answer8,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer9 == null || $answer9 == '' || $answer9 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Confidence',
							'answer'=> $answer9,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Confidence',
							'answer'=> $answer9,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer10 == null || $answer10 == '' || $answer10 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Confidence',
							'answer'=> $answer10,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Confidence',
							'answer'=> $answer10,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer11 == null || $answer11 == '' || $answer11 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 11,
							'ptype'=> 'Confidence',
							'answer'=> $answer11,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 11,
							'ptype'=> 'Confidence',
							'answer'=> $answer11,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer12 == null || $answer12 == '' || $answer12 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 12,
							'ptype'=> 'Confidence',
							'answer'=> $answer12,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 12,
							'ptype'=> 'Confidence',
							'answer'=> $answer12,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer13 == null || $answer13 == '' || $answer13 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 13,
							'ptype'=> 'Confidence',
							'answer'=> $answer13,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 13,
							'ptype'=> 'Confidence',
							'answer'=> $answer13,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer14 == null || $answer14 == '' || $answer14 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 14,
							'ptype'=> 'Confidence',
							'answer'=> $answer14,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 14,
							'ptype'=> 'Confidence',
							'answer'=> $answer14,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer15 == null || $answer15 == '' || $answer15 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 15,
							'ptype'=> 'Confidence',
							'answer'=> $answer15,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 15,
							'ptype'=> 'Confidence',
							'answer'=> $answer15,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//Maturity------------------------------------------------------------------//
					if($answer16 == null || $answer16 == '' || $answer16 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Maturity',
							'answer'=> $answer16,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Maturity',
							'answer'=> $answer16,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer17 == null || $answer17 == '' || $answer17 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Maturity',
							'answer'=> $answer17,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Maturity',
							'answer'=> $answer17,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer18 == null || $answer18 == '' || $answer18 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Maturity',
							'answer'=> $answer18,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Maturity',
							'answer'=> $answer18,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer19 == null || $answer19 == '' || $answer19 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Maturity',
							'answer'=> $answer19,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Maturity',
							'answer'=> $answer19,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer20 == null || $answer20 == '' || $answer20 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Maturity',
							'answer'=> $answer20,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Maturity',
							'answer'=> $answer20,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer21 == null || $answer21 == '' || $answer21 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Maturity',
							'answer'=> $answer21,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Maturity',
							'answer'=> $answer21,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer22 == null || $answer22 == '' || $answer22 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Maturity',
							'answer'=> $answer22,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Maturity',
							'answer'=> $answer22,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer23 == null || $answer23 == '' || $answer23 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Maturity',
							'answer'=> $answer23,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Maturity',
							'answer'=> $answer23,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer24 == null || $answer24 == '' || $answer24 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Maturity',
							'answer'=> $answer24,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Maturity',
							'answer'=> $answer24,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer25 == null || $answer25 == '' || $answer25 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Maturity',
							'answer'=> $answer25,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Maturity',
							'answer'=> $answer25,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//Outgoing------------------------------------------------------------------//
					if($answer26 == null || $answer26 == '' || $answer26 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Outgoing',
							'answer'=> $answer26,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'Outgoing',
							'answer'=> $answer26,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer27 == null || $answer27 == '' || $answer27 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Outgoing',
							'answer'=> $answer27,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'Outgoing',
							'answer'=> $answer27,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer28 == null || $answer28 == '' || $answer28 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Outgoing',
							'answer'=> $answer28,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'Outgoing',
							'answer'=> $answer28,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer29 == null || $answer29 == '' || $answer29 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Outgoing',
							'answer'=> $answer29,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'Outgoing',
							'answer'=> $answer29,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer30 == null || $answer30 == '' || $answer30 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Outgoing',
							'answer'=> $answer30,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'Outgoing',
							'answer'=> $answer30,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer31 == null || $answer31 == '' || $answer31 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Outgoing',
							'answer'=> $answer31,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'Outgoing',
							'answer'=> $answer31,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer32 == null || $answer32 == '' || $answer32 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Outgoing',
							'answer'=> $answer32,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'Outgoing',
							'answer'=> $answer32,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer33 == null || $answer33 == '' || $answer33 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Outgoing',
							'answer'=> $answer33,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'Outgoing',
							'answer'=> $answer33,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer34 == null || $answer34 == '' || $answer34 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Outgoing',
							'answer'=> $answer34,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'Outgoing',
							'answer'=> $answer34,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer35 == null || $answer35 == '' || $answer35 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Outgoing',
							'answer'=> $answer35,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'Outgoing',
							'answer'=> $answer35,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//selfcontrol------------------------------------------------------------------//
					if($answer36 == null || $answer36 == '' || $answer36 != 'd')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'SelfControl',
							'answer'=> $answer36,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 1,
							'ptype'=> 'SelfControl',
							'answer'=> $answer36,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer37 == null || $answer37 == '' || $answer37 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'SelfControl',
							'answer'=> $answer37,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 2,
							'ptype'=> 'SelfControl',
							'answer'=> $answer37,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer38 == null || $answer38 == '' || $answer38 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'SelfControl',
							'answer'=> $answer38,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 3,
							'ptype'=> 'SelfControl',
							'answer'=> $answer38,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer39 == null || $answer39 == '' || $answer39 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'SelfControl',
							'answer'=> $answer39,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 4,
							'ptype'=> 'SelfControl',
							'answer'=> $answer39,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer40 == null || $answer40 == '' || $answer40 != 'c')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'SelfControl',
							'answer'=> $answer40,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 5,
							'ptype'=> 'SelfControl',
							'answer'=> $answer40,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer41 == null || $answer41 == '' || $answer41 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'SelfControl',
							'answer'=> $answer41,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 6,
							'ptype'=> 'SelfControl',
							'answer'=> $answer41,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer42 == null || $answer42 == '' || $answer42 != 'b')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'SelfControl',
							'answer'=> $answer42,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 7,
							'ptype'=> 'SelfControl',
							'answer'=> $answer42,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer43 == null || $answer43 == '' || $answer43 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'SelfControl',
							'answer'=> $answer43,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 8,
							'ptype'=> 'SelfControl',
							'answer'=> $answer43,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer44 == null || $answer44 == '' || $answer44 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'SelfControl',
							'answer'=> $answer44,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 9,
							'ptype'=> 'SelfControl',
							'answer'=> $answer44,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					if($answer45 == null || $answer45 == '' || $answer45 != 'a')
					{
						$status = 'No Answer/Incorrect Answer';
						
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'SelfControl',
							'answer'=> $answer45,
							'status'=> $status,
							'created_at'=> now()
						]);
					}
					else
					{
						DB::table('personal_test_d')->insert([
							'ptestid'=> $gettestid,
							'regid'=> $id,
							'pno'=> 10,
							'ptype'=> 'SelfControl',
							'answer'=> $answer45,
							'status'=> 'Answered',
							'created_at'=> now()
						]);
					}
					
					//confidence score------------------------------------------------------------------//					
					$confidence = DB::table('personal_test_d')->where('regid', $id)
														    ->where('ptype', 'Confidence')
														    ->where('status', 'Answered')
															->count();
					
					if($confidence == 0 || $confidence < 1)
					{
						$confidencescore = 0;
					}
					elseif($confidence == 1)
					{
						$confidencescore = 35;
					}
					elseif($confidence == 2)
					{
						$confidencescore = 40;
					}
					elseif($confidence == 3)
					{
						$confidencescore = 45;
					}
					elseif($confidence == 4)
					{
						$confidencescore = 50;
					}
					elseif($confidence == 5)
					{
						$confidencescore = 55;
					}
					elseif($confidence == 6)
					{
						$confidencescore = 60;
					}
					elseif($confidence == 7)
					{
						$confidencescore = 65;
					}
					elseif($confidence == 8)
					{
						$confidencescore = 65;
					}
					elseif($confidence == 9)
					{
						$confidencescore = 70;
					}
					elseif($confidence == 10)
					{
						$confidencescore = 75;
					}
					elseif($confidence == 11)
					{
						$confidencescore = 80;
					}
					elseif($confidence == 12)
					{
						$confidencescore = 85;
					}
					elseif($confidence == 13)
					{
						$confidencescore = 90;
					}
					elseif($confidence == 14)
					{
						$confidencescore = 95;
					}
					elseif($confidence == 15)
					{
						$confidencescore = 100;
					}
					
					DB::table('personal_test_score')->insert([
						'ptestid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Confidence',
						'correct_answers'=> $confidence,
						'score'=> $confidencescore,
						'created_at'=> now()
					]);
					//confidence score------------------------------------------------------------------//
					
					//maturity score------------------------------------------------------------------//					
					$maturity = DB::table('personal_test_d')->where('regid', $id)
														    ->where('ptype', 'Maturity')
														    ->where('status', 'Answered')
															->count();
					
					if($maturity == 0 || $maturity < 1)
					{
						$maturityscore = 0;
					}
					elseif($maturity == 1)
					{
						$maturityscore = 60;
					}
					elseif($maturity == 2)
					{
						$maturityscore = 65;
					}
					elseif($maturity == 3)
					{
						$maturityscore = 70;
					}
					elseif($maturity == 4)
					{
						$maturityscore = 75;
					}
					elseif($maturity == 5)
					{
						$maturityscore = 80;
					}
					elseif($maturity == 6)
					{
						$maturityscore = 85;
					}
					elseif($maturity == 7)
					{
						$maturityscore = 90;
					}
					elseif($maturity == 8)
					{
						$maturityscore = 90;
					}
					elseif($maturity == 9)
					{
						$maturityscore = 95;
					}
					elseif($maturity == 10)
					{
						$maturityscore = 100;
					}
					
					DB::table('personal_test_score')->insert([
						'ptestid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Maturity',
						'correct_answers'=> $maturity,
						'score'=> $maturityscore,
						'created_at'=> now()
					]);
					//maturity score------------------------------------------------------------------//
					
					//outgoing score------------------------------------------------------------------//					
					$outgoing = DB::table('personal_test_d')->where('regid', $id)
														    ->where('ptype', 'Outgoing')
														    ->where('status', 'Answered')
															->count();
					
					if($outgoing == 0 || $outgoing < 1)
					{
						$outgoingscore = 0;
					}
					elseif($outgoing == 1)
					{
						$outgoingscore = 60;
					}
					elseif($outgoing == 2)
					{
						$outgoingscore = 65;
					}
					elseif($outgoing == 3)
					{
						$outgoingscore = 70;
					}
					elseif($outgoing == 4)
					{
						$outgoingscore = 75;
					}
					elseif($outgoing == 5)
					{
						$outgoingscore = 80;
					}
					elseif($outgoing == 6)
					{
						$outgoingscore = 85;
					}
					elseif($outgoing == 7)
					{
						$outgoingscore = 90;
					}
					elseif($outgoing == 8)
					{
						$outgoingscore = 90;
					}
					elseif($outgoing == 9)
					{
						$outgoingscore = 95;
					}
					elseif($outgoing == 10)
					{
						$outgoingscore = 100;
					}
					
					DB::table('personal_test_score')->insert([
						'ptestid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'Outgoing',
						'correct_answers'=> $outgoing,
						'score'=> $outgoingscore,
						'created_at'=> now()
					]);
					//outgoing score------------------------------------------------------------------//
					
					//selfcontrol score------------------------------------------------------------------//					
					$selfcontrol = DB::table('personal_test_d')->where('regid', $id)
														    ->where('ptype', 'SelfControl')
														    ->where('status', 'Answered')
															->count();
					
					if($selfcontrol == 0 || $selfcontrol < 1)
					{
						$selfcontrolscore = 0;
					}
					elseif($selfcontrol == 1)
					{
						$selfcontrolscore = 60;
					}
					elseif($selfcontrol == 2)
					{
						$selfcontrolscore = 65;
					}
					elseif($selfcontrol == 3)
					{
						$selfcontrolscore = 70;
					}
					elseif($selfcontrol == 4)
					{
						$selfcontrolscore = 75;
					}
					elseif($selfcontrol == 5)
					{
						$selfcontrolscore = 80;
					}
					elseif($selfcontrol == 6)
					{
						$selfcontrolscore = 85;
					}
					elseif($selfcontrol == 7)
					{
						$selfcontrolscore = 90;
					}
					elseif($selfcontrol == 8)
					{
						$selfcontrolscore = 90;
					}
					elseif($selfcontrol == 9)
					{
						$selfcontrolscore = 95;
					}
					elseif($selfcontrol == 10)
					{
						$selfcontrolscore = 100;
					}
					
					DB::table('personal_test_score')->insert([
						'ptestid'=> $gettestid,
						'regid'=> $id,
						'ptype'=> 'SelfControl',
						'correct_answers'=> $selfcontrol,
						'score'=> $selfcontrolscore,
						'created_at'=> now()
					]);
					//selfcontrol score------------------------------------------------------------------//
					
					//grand total score------------------------------------------------------------------//					
					$grandtotal = DB::table('personal_test_score')->where('ptestid', $gettestid)->sum('score');
					
					DB::table('personal_test')->where('id', $gettestid)->update([
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