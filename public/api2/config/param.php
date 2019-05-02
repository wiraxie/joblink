<?php

$q=$_REQUEST['q'];
$q2=$_REQUEST['q2'];
$token=$_REQUEST['token'];
$dt=explode('|', $q2);
$query="";
$datatype="select";
/*
function getallheaders() 
    { 
          
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value; 
           } 
       } 
       return $headers; 
    } 

foreach (getallheaders() as $name => $value) {
   $header.="$name: $value\n";
}

$data = file_get_contents('php://input');
$body = json_decode($data, true);
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$myfile = fopen("history.txt", "r+") or die("Unable to open file!");
fwrite($myfile,'url : '.$link."\r\n");
fwrite($myfile,'header : '.$header."\r\n");
fwrite($myfile,'body : '.$data."\r\n");
fwrite($myfile,'p2 : '.$_REQUEST['p2']."\r\n");
fwrite($myfile,'time : '. date("h:i:sa")."\r\n");
fclose($myfile);*/
//echo $headers["Authorization"];
//die();

function run_sql($str){
	$query=$str;
	include("exec2.php");
	return $json;
}

$m=$_SERVER['REQUEST_METHOD'];


if ($m=="PUT"){
	$data = file_get_contents('php://input');
	$dt = json_decode($data, true);
}
if ($m=="POST"){
	$data = file_get_contents('php://input');
	$dt = json_decode($data, true);
}
if ($m=="DELETE"){
	$data = file_get_contents('php://input');
	$dt = json_decode($data, true);
}

if ($m=="GET"){
	$func=$q."_".$m;
	if (function_exists($func)) {
		$query=$func($dt);
		xi_get($query);
	}
}

if ($m=="POST"){
	$func=$q."_".$m."_insert";
	if (function_exists($func)) {
		$query=$func($dt);
		xi_post($query);
	}
}

if ($m=="POST"){
	$func=$q."_".$m."_form";
	if (function_exists($func)) {
		$dt=explode('|', $q2);
		$query=$func($dt);
		xi_post($query);
	}
}

if ($m=="POST"){
	$func=$q."_".$m."_select";
	if (function_exists($func)) {
		$query=$func($dt);
		xi_get($query);
	}
}

if ($m=="PUT"){
	$func=$q."_".$m;
	if (function_exists($func)) {
		$query=$func($dt);
		xi_put($query);
	}
}

if ($m=="DELETE"){
	$func=$q."_".$m;
	if (function_exists($func)) {
		$query=$func($dt);
		xi_delete($query);
	}
}


function xi_get($str){
	$query=$str;
	include("exec2.php");
	$json=str_replace('"[{','[{',$json);
	$json=str_replace('}]"','}]',$json);
	$json=str_replace('\"','"',$json);
	$json=str_replace('\/','/',$json);
	if ($json == "null")
	{
		var_dump(http_response_code(401));ob_clean();echo '[{"status":"401","message":"No records were found"}]';die();
	}
	echo '[{"status":"200","message":"success","data":'.$json.'}]';die();
}

function xi_post($str){
	$query=$str;
	include("exec3.php");
}


function xi_put($str){
	$query=$str;
	include("exec5.php");
}

function xi_delete($str){
	$query=$str;
	include("exec4.php");
}

$str="";
$rows2="";


?>