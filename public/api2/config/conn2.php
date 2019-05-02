<?php

$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "adnet110";
$mysql_database = "joblink";
$prefix = "";
$db2 = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Database connection is failed 1");
$result=mysqli_query($db2,"SET SESSION group_concat_max_len = 1000000");
?>