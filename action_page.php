<?php

    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
	$db = "meravali_CakeHouse";
	
	$conn = new mysqli ($host, $user, $password, $db);
	
	if ($conn-> connect_error) {
	die ("Connection faild: " .$conn->connect_error); }
	
	echo "Connection successful";
	

if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}

header( 'Location: http://meravalis.mtacloud.co.il/Includes/finalPage.html' ) ;

$conn->close();
?>