<?php
//echo 'tes'.$_SERVER['HTTP_AUTHORIZATION'];die();
//token : id;secret;duration;
//1:tbm:8cd40ae115bbebb7821438999960ef96 (id,appid,md5(custid,customer))
//echo base64_encode('1:tbm:8cd40ae115bbebb7821438999960ef96');
//MTp0Ym06OGNkNDBhZTExNWJiZWJiNzgyMTQzODk5OTk2MGVmOTY=

function getBearerToken() {
    //$headers = $_SERVER['HTTP_X_API_KEY'];
	//echo $headers;
    if (!empty($headers)) {
        if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
    }else
	{
		 $headers = $_SERVER['HTTP_AUTHORIZATION'];
		 if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
            return $matches[1];
        }
	}
    return null;
}
$token=getBearerToken();


$tk=explode(':',base64_decode($token));
if ($_REQUEST['q']!="confirmemail"){
	if (!$token){echo '[{"status":"200","message":"access failed"}]';die();}
	$str="select expdate,lastdate,dailylimit,todayhits from ms_user where secretkey='$tk[2]'";include("exec2.php");
	$date = $rows2[0]['expdate'];
	$lastdate = $rows2[0]['lastdate'];
	$dailylimit = $rows2[0]['dailylimit'];
	$todayhits = $rows2[0]['todayhits'];
	if ($date==""){echo '[{"status":"200","message":"Invalid token"}]';die();}
	$today = date("Y-m-d");
	//echo $today.$date;die();
	if ($today>$date){echo '[{"status":"200","message":"expired user"}]';die();}else 
	{

	if ($today==$lastdate)
		{if ($dailylimit<=$todayhits){echo '[{"status":"exceed daily limit access"}]';die();}
		$str="update ms_user set todayhits=todayhits+1,lastdate=now(),hits=hits+1 where secretkey='$tk[2]'";}
	else
		{$str="update ms_user set todayhits=1,lastdate=now(),hits=hits+1 where secretkey='$tk[2]'";}	
	include("exec2.php");//echo '[{"status":"access granted"}]';
	}
}
?>