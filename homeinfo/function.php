<?php

 function my_connect()
 {
 	$host="localhost";
 	$dbuser="root";
 	$dbpassword="";
 	$db="homeinfo";
 	$connection_string=mysqli_connect($host,$dbuser,$dbpassword,$db)or die("Unable to select");
 	return $connection_string;
 }
?>