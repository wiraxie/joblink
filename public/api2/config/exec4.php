<?php
//for deleting data
include('conn2.php');
$result = mysqli_query($db2,$str);
if(mysqli_affected_rows($db2)==0){
	var_dump(http_response_code(401));ob_clean();echo '[{"status":"401","message":"failed to delete data"}]';die();
}else
{
	if(mysqli_affected_rows($db2)==1){
	echo '[{"status":"200","message":"success to delete '.mysqli_affected_rows($db2) .' record"}]';}else{
	echo '[{"status":"200","message":"success to delete '.mysqli_affected_rows($db2) .' records"}]';
	} 
}
mysqli_close($db2);
?>