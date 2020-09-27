<!DOCTYPE html>
<html>
<head>
    
	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="../CSS/search.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
    <!-- JS -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script> 
	<script type="text/javascript" src='../JS/header.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	

	
    <title>Merav's Cake House</title>  
	
    <script> 
	$(function(){
	$("#header").load("../Includes/header.html"); 
	$("#footer").load("../Includes/footer.html"); 
	});
	</script>
    
</head>
<body>
    
<div id="wrapper" class="container-fluid">
	<div id="internalWrapper" class="container-fluid">
                <header>
					<div id="header"></div>
				</header>

<?php

    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
	$db = "meravali_CakeHouse";
	
	$conn = new mysqli ($host, $user, $password, $db);
//	$conn->exec("set names utf8");
	$conn -> set_charset("utf8");
	
	if ($conn-> connect_error) {
	die ("Connection faild: " .$conn->connect_error); }
	
//	echo "Connection successful";
	echo "<br>";
	

if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}

$recipe = $_POST["recipe_name"];
$sql = "SELECT * FROM recipes WHERE recipe_name LIKE '%".$recipe."%'";  
$result = $conn->query($sql);


echo "<br>";
if ($result->num_rows > 0) {
    echo "<div><table><tr><th>מספר מתכון</th><th>שם</th><th>תיאור קצר</th><th>קישור למתכון</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["counter"]."</td><td>".$row["recipe_name"]."</td><td>".$row["recipe_description"]."</td><td><a href=".$row["recipe_link"].">".$row["recipe_name"]."</a></td></tr>";
    }
    echo "</table></div>";
} else {
    echo "0 results";
}

$conn->close();
?>

<br>
<br>

        <div id="footer"></div>
    
    </div>
</div>
</body>
</html>