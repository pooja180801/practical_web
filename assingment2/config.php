<?php


$db_server="localhost";
$db_user="root";
$db_pass="1808";
$db_name="businessdb";
$conn="";
 $conn=mysqli_connect($db_server,$db_user,$db_pass,$db_name);


if (!$conn) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}


?>



  