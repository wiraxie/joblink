<?php
include('conn2.php');

$result=mysqli_query($db2,$str);
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$rows2[] = $row;
}
$json=json_encode($rows2);

mysqli_close($db2);
?>