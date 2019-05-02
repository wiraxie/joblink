<?php
//Authorization Bearer MTp0Ym06OGNkNDBhZTExNWJiZWJiNzgyMTQzODk5OTk2MGVmOTY=
//phpinfo();die();

function testget_get($dt)
{
	$query = "select id FROM personal limit 1;";
	return $query;
}

//UPLOAD....................................................................................................................................//

//profile
function uploadprofile_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$uploaded = "SELECT id FROM personal_uploads WHERE regid=".$regid." AND title='Profile';";
	$uploadedresult = run_sql($uploaded);
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				if($uploadedresult != 'null' || $$uploadedresult != null)
				{
					$query = "UPDATE personal_uploads SET photourl='uploads/".$dbfilename."' , updated_at=now() WHERE regid=".$regid." AND title='Profile';";
					run_sql($query);
				}
				else
				{
					$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'Profile', 'uploads/".$dbfilename."', now())";
					run_sql($query);
				}
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//akte
function uploadakte_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$uploaded = "SELECT id FROM personal_uploads WHERE regid=".$regid." AND title='Akte Lahir';";
	$uploadedresult = run_sql($uploaded);
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				if($uploadedresult != 'null' || $$uploadedresult != null)
				{
					$query = "UPDATE personal_uploads SET photourl='uploads/".$dbfilename."' , updated_at=now() WHERE regid=".$regid." AND title='Akte Lahir';";
					run_sql($query);
				}
				else
				{
					$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'Akte Lahir', 'uploads/".$dbfilename."', now())";
					run_sql($query);
				}
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//ktp
function uploadktp_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$uploaded = "SELECT id FROM personal_uploads WHERE regid=".$regid." AND title='KTP';";
	$uploadedresult = run_sql($uploaded);
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				if($uploadedresult != 'null' || $$uploadedresult != null)
				{
					$query = "UPDATE personal_uploads SET photourl='uploads/".$dbfilename."' , updated_at=now() WHERE regid=".$regid." AND title='KTP';";
					run_sql($query);
				}
				else
				{
					$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'KTP', 'uploads/".$dbfilename."', now())";
					run_sql($query);
				}
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//ijazah
function uploadijazah_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$getid = "SELECT id FROM personal_uploads where regid=".$regid." AND title='Ijazah' ORDER BY id DESC LIMIT 1;";
	$getidresult = run_sql($getid);
	$unnecessary1 = array('[', ']', '{', '}', '"', 'id:');
	if($getidresult == 'null' || $getidresult == null)
	{
		$idquery = "SELECT id+1 as id FROM personal_uploads where regid=".$regid." ORDER BY id DESC LIMIT 1;";
		$idqueryresult = run_sql($idquery);
		$getidresult = str_replace($unnecessary1, '', $idqueryresult);
	}
	else
	{
		$getidresult = str_replace($unnecessary1, '', $getidresult);
		$getidresult = $getidresult + 1;
	}
	
	$ext = pathinfo($dbfilename, PATHINFO_EXTENSION); //.jpg
	
	$newdbfilename = strstr($dbfilename, '.', true); 
	$new_target_file = $newdbfilename.$getidresult.'.'.$ext;
	$newfile = $target_dir.$new_target_file;
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfile)) 
			{
				$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'Ijazah', 'uploads/".$new_target_file."', now())";
				run_sql($query);
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}


//sertifikat
function uploadsertifikat_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$getid = "SELECT id FROM personal_uploads where regid=".$regid." AND title='Sertifikat' ORDER BY id DESC LIMIT 1;";
	$getidresult = run_sql($getid);
	$unnecessary1 = array('[', ']', '{', '}', '"', 'id:');
	if($getidresult == 'null' || $getidresult == null)
	{
		$idquery = "SELECT id+1 as id FROM personal_uploads where regid=".$regid." ORDER BY id DESC LIMIT 1;";
		$idqueryresult = run_sql($idquery);
		$getidresult = str_replace($unnecessary1, '', $idqueryresult);
	}
	else
	{
		$getidresult = str_replace($unnecessary1, '', $getidresult);
		$getidresult = $getidresult + 1;
	}
	
	$ext = pathinfo($dbfilename, PATHINFO_EXTENSION); //.jpg
	
	$newdbfilename = strstr($dbfilename, '.', true); 
	$new_target_file = $newdbfilename.$getidresult.'.'.$ext;
	$newfile = $target_dir.$new_target_file;
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfile)) 
			{
				$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'Sertifikat', 'uploads/".$new_target_file."', now())";
				run_sql($query);
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//SIM
function uploadsim_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$getid = "SELECT id FROM personal_uploads where regid=".$regid." AND title='SIM' ORDER BY id DESC LIMIT 1;";
	$getidresult = run_sql($getid);
	$unnecessary1 = array('[', ']', '{', '}', '"', 'id:');
	if($getidresult == 'null' || $getidresult == null)
	{
		$idquery = "SELECT id+1 as id FROM personal_uploads where regid=".$regid." ORDER BY id DESC LIMIT 1;";
		$idqueryresult = run_sql($idquery);
		$getidresult = str_replace($unnecessary1, '', $idqueryresult);
	}
	else
	{
		$getidresult = str_replace($unnecessary1, '', $getidresult);
		$getidresult = $getidresult + 1;
	}
	
	$ext = pathinfo($dbfilename, PATHINFO_EXTENSION); //.jpg
	
	$newdbfilename = strstr($dbfilename, '.', true); 
	$new_target_file = $newdbfilename.$getidresult.'.'.$ext;
	$newfile = $target_dir.$new_target_file;
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfile)) 
			{
				$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'SIM', 'uploads/".$new_target_file."', now())";
				run_sql($query);
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//other
function uploadother_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	$getid = "SELECT id FROM personal_uploads where regid=".$regid." AND title='Lain-Lain' ORDER BY id DESC LIMIT 1;";
	$getidresult = run_sql($getid);
	$unnecessary1 = array('[', ']', '{', '}', '"', 'id:');
	if($getidresult == 'null' || $getidresult == null)
	{
		$idquery = "SELECT id+1 as id FROM personal_uploads where regid=".$regid." ORDER BY id DESC LIMIT 1;";
		$idqueryresult = run_sql($idquery);
		$getidresult = str_replace($unnecessary1, '', $idqueryresult);
	}
	else
	{
		$getidresult = str_replace($unnecessary1, '', $getidresult);
		$getidresult = $getidresult + 1;
	}
	
	$ext = pathinfo($dbfilename, PATHINFO_EXTENSION); //.jpg
	
	$newdbfilename = strstr($dbfilename, '.', true); 
	$new_target_file = $newdbfilename.$getidresult.'.'.$ext;
	$newfile = $target_dir.$new_target_file;
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(move_uploaded_file($_FILES["photo"]["tmp_name"], $newfile)) 
			{
				$query = "INSERT INTO personal_uploads(regid, title, photourl, created_at) VALUES(".$regid.", 'Lain-Lain', 'uploads/".$new_target_file."', now())";
				run_sql($query);
		
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//UPDATE....................................................................................................................................//

//ijazah update
function updateijazah_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);

	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	elseif(!file_exists($target_file))
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(unlink($target_file) && move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				$query = "UPDATE personal_uploads SET updated_at=now() WHERE regid=".$regid." AND photourl='uploads/".$dbfilename."';";
				run_sql($query);
				
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//sertifikat update
function updatesertifikat_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);

	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	elseif(!file_exists($target_file))
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(unlink($target_file) && move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				$query = "UPDATE personal_uploads SET updated_at=now() WHERE regid=".$regid." AND photourl='uploads/".$dbfilename."';";
				run_sql($query);
				
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//sim update
function updatesim_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);

	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	elseif(!file_exists($target_file))
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(unlink($target_file) && move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				$query = "UPDATE personal_uploads SET updated_at=now() WHERE regid=".$regid." AND photourl='uploads/".$dbfilename."';";
				run_sql($query);
				
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//other update
function updateother_post_form($dt)
{	
	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($_FILES["photo"]["name"]);
	$uploadOk = 1;
	
	$dbfilename = $_FILES["photo"]["name"];
	$regid = strstr(basename($_FILES["photo"]["name"]), '_', true);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);

	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	elseif(!file_exists($target_file))
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) 
		{
			$check = getimagesize($_FILES["photo"]["tmp_name"]);
			if($check !== false) 
			{
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} 
			else 
			{
				//echo "File is not an image.";
				echo '[{"message":"Failed to upload, file is not an image!"}]';
				$uploadOk = 0;
				die();
			}
		}
		// Check file size
		if ($_FILES["photo"]["size"] > 10485760) //MAX 10M
		{
			//echo "Sorry, your file is too large.";
			echo '[{"message":"Failed to upload, MAX file 10MB!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
		{
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			echo '[{"message":"Failed to upload, only JPG, JPEG, PNG & GIF files are allowed!"}]';
			$uploadOk = 0;
			http_response_code(406);
			die();
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) 
		{
			echo '[{"message":"failed"}]';
			http_response_code(406);
			die();
		}
		else 
		{	
			if(unlink($target_file) && move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) 
			{
				$query = "UPDATE personal_uploads SET updated_at=now() WHERE regid=".$regid." AND photourl='uploads/".$dbfilename."';";
				run_sql($query);
				
				echo '[{"message":"success"}]';
				http_response_code(200);
				die();
			} 
			else 
			{
				echo '[{"message":"failed"}]';
				http_response_code(406);
				die();
			}
		}
	}
}

//DELETE....................................................................................................................................//
function deletephoto_post_select($dt)
{	
	$regid = $dt[0]['id'];
	$uploadid = $dt[0]['uploadid'];
	$photourl = $dt[0]['photourl'];
	
	preg_match("/[^\/]+$/", $photourl, $matches);
	$filename = $matches[0];

	$target_dir = "../../uploads/";
	$target_file = $target_dir . basename($filename);
	
	$validate = "SELECT id FROM personal_registration WHERE id=".$regid.";";
	$validateresult = run_sql($validate);
	
	if($validateresult == 'null' || $validateresult == null)
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	elseif($uploadid == "" || $uploadid == null || $uploadid == 'null')
	{
		echo '[{"message":"uploadid is required"}]';
		http_response_code(406);
		die();
	}
	elseif($photourl == "" || $photourl == null || $photourl == 'null')
	{
		echo '[{"message":"photourl is required"}]';
		http_response_code(406);
		die();
	}
	elseif(!file_exists($target_file))
	{
		echo '[{"message":"data not found"}]';
		http_response_code(404);
		die();
	}
	else
	{	
		$dbphotourl = "SELECT photourl FROM personal_uploads WHERE id=".$uploadid.";";
		$dbphotourlresult = run_sql($dbphotourl);
		$unnecessary1 = array('[', ']', '{', '}', '"', "photourl:", "uploads\/");
		$dbphotourlresult = str_replace($unnecessary1, '', $dbphotourlresult);
		
		if($dbphotourlresult != $filename)
		{
			echo '[{"message":"file name did not match with uploadid"}]';
			http_response_code(406);
			die();
		}
		elseif(unlink($target_file))
		{
			$query = "DELETE FROM personal_uploads WHERE id=".$uploadid." AND regid=".$regid.";";
			run_sql($query);
			
			echo '[{"message":"success"}]';
			http_response_code(200);
			die();
		}
		else
		{
			echo '[{"message":"failed"}]';
			http_response_code(400);
			die();
		}	
	}
}

?>