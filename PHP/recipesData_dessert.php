<?php

    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
// 	$db = "meravali_CakeHouse";
	
    try {
      $conn = new PDO("mysql:host=$host;dbname=meravali_CakeHouse", $user, $password);
      // set the PDO error mode to exception
      $conn->exec("set names utf8");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
?>

    <!-- CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--<link rel="stylesheet" type="text/css" href="../CSS/header.css">-->
	<!--<link rel="stylesheet" type="text/css" href="../CSS/footer.css">-->
	<link rel="stylesheet" type="text/css" href="../CSS/Reciep.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    
 
<?php    
    if(isset($_POST["action"])) {
        
    	$query = "
		SELECT * FROM recipes WHERE category = 'dessert' 
	";

	if(isset($_POST["recipes_time"]))
	{
		$time_filter = implode("','", $_POST["recipes_time"]);
		$query .= "
		 AND recipes_time IN ('".$time_filter."')
		";
	}
	if(isset($_POST["recipes_difficulty"]))
	{
		$recipes_difficulty_filter = implode("','", $_POST["recipes_difficulty"]);
		$query .= "
		 AND recipes_difficulty IN ('".$recipes_difficulty_filter."')
		";
	}
	if(isset($_POST["parve_or_dairy"]))
	{
		$parve_or_dairy_filter = implode("','", $_POST["parve_or_dairy"]);
		$query .= "
		 AND parve_or_dairy IN('".$parve_or_dairy_filter."')
		";
	}
	if(isset($_POST["oven_free"]))
	{
		$oven_free_filter = implode("','", $_POST["oven_free"]);
		$query .= "
		 AND oven_free IN('".$oven_free_filter."')
		";
	}
	if(isset($_POST["mixer_free"]))
	{
		$mixer_free_filter = implode("','", $_POST["mixer_free"]);
		$query .= "
		 AND mixer_free IN('".$mixer_free_filter."')
		";
	}
	if(isset($_POST["gluten_free"]))
	{
		$gluten_free_filter = implode("','", $_POST["gluten_free"]);
		$query .= "
		 AND gluten_free IN('".$gluten_free_filter."')
		";
	}
    
    

	$statement = $conn->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{

			$output .= '
                     <br>  
                    <div class="card col-sm-4 col-lg-3 col-md-3" dir="rtl" style= "width: 25rem; margin: 1%;">
                        <img src= '. $row['image'].' alt="dessert" style="width:100%">
  	                    <h5> '. $row['recipe_name'] .' </h5>
                        <p style=" font-size: small;"> '. $row['recipe_description'] .'</p>
                        <p style=" font-size: medium;"> זמן הכנה: '. $row['recipes_time'] .'</p>
                    	<p style=" font-size: medium;"> רמת קושי: '. $row['recipes_difficulty'] .' </p>
                  <p><button class="bcard" onclick= window.location="'. $row['recipe_link'] .'";>קרא עוד</button></p>
                    </div>
                    </br>
			';
		}
		
	}
	
	
	else
	{
		$output = '<h3>אין מתכונים זמינים. </h3>';
	}
	echo $output;
}

?>

