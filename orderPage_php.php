
<?php
session_start();


    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
	$db = "meravali_CakeHouse";
	
	$conn = new mysqli ($host, $user, $password, $db);
	
	if ($conn-> connect_error) {
	die ("Connection faild: " .$conn->connect_error); }
	
	echo "Connection successful";
	

if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}


$first_name=$_POST["fname"];
$last_name=$_POST["lname"];
$email=$_POST["email"];
$telephone=$_POST["tel"];
$city=$_POST["city"];
$address=$_POST["address"];
$house_num=$_POST["hnum"];
$postal_code=$_POST["zip"];
$delivery_date=$_POST["date"];
$comments=$_POST["comments"];
$total_price=$_SESSION["total_price"];


setcookie("total_price", $total_price,time()+3600); /* expire in 1 hour */


$sql2="INSERT INTO orders (fname,lname,email,telephone,city,address,house_num,postal_code,delivery_date,comments,total_price) VALUES ('".$first_name."','".$last_name."','".$email."','".$telephone."','".$city."','".$address."',".$house_num.",".$postal_code.",'".$delivery_date."','".$comments."',".$total_price.");";
$conn->query($sql2);


header( 'Location: http://meravalis.mtacloud.co.il/PHP/paymentPage.php' ) ;

$conn->close();
?>
