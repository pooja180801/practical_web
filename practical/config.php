<?php

$db_server="localhost";
$db_user="root";
$db_pw="1808";
$db_name="practical";

$conn=mysqli_connect($db_server,$db_user,$db_pw,$db_name);

if(!$conn){
    die("mysql connection failed :" .mysqli_connect_error());
}

?>