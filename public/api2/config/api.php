<?php
	


    function getallheaders() 
    { 
           $headers = []; 
       foreach ($_SERVER as $name => $value) 
       { 
           if (substr($name, 0, 5) == 'HTTP_') 
           { 
               $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = 'header '.$i." : ".$value; 
           } 
		   $i++;
       } 
       return $headers; 
    } 
$header=getallheaders();
	
$body = file_get_contents('php://input');
	
$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//$myfile = fopen("history.txt", "r+") or die("Unable to open file!");
fwrite($myfile,'url : '.$link."\r\n");
fwrite($myfile,'header : '.json_encode($header)."\r\n");

fwrite($myfile,'body : '.$body."\r\n");
fclose($myfile);



header('Content-Type: application/json');
date_default_timezone_set("Asia/Jakarta");

include("oauth.php");
include("../executeapi.php");
include("param.php");
include("error.php");

?>