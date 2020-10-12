<?php
    session_start();
    
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
    
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   <script src="http://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
   <script type="text/javascript" src='../JS/Reciep.js'></script>
    
    <style>
      .list-inline>li{display:inline-block;padding-right:5px;padding-left:5px;}
      

      
      @media screen and (max-width: 600px) {
          .card .col-sm-3 {
              position: relative;
              width: 50%;
              margin: 0;
              
              
          }
          
      }
    </style>
    
    <script> 
    function InactiveAlert() {
      alert("העמוד לא פעיל כרגע");
    }
    </script>
    
 
<?php 

    if(isset($_POST["index"], $_POST["recipes_counter"]))
        {
           
        if (isset($_SESSION['userId'])) {
         $q = "
         INSERT INTO rating_recipes (recipes_counter, rating) 
         VALUES (:recipes_counter, :rating)
         ";
         $stmt = $conn->prepare($q);
         $stmt->execute(
          array(
           ':recipes_counter'  => $_POST["recipes_counter"],
           ':rating'   => $_POST["index"]
          )
         );
         $res = $stmt->fetchAll();
         if(isset($res))
         {
          echo 'done';
         }
        }
        
}



    function count_rating($recipes_counter, $conn)
    {
     $output = 0;
     $query = "SELECT AVG(rating) as rating FROM rating_recipes WHERE recipes_counter = '".$recipes_counter."'";
     $statement = $conn->prepare($query);
     $statement->execute();
     $result = $statement->fetchAll();
     $total_row = $statement->rowCount();
     if($total_row > 0)
     {
      foreach($result as $row)
      {
       $output = round($row["rating"]);
      }
     }
     return $output;
    }
    
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
            $rating = count_rating($row['counter'], $conn);
            $color = '';
            
            if (isset($_SESSION['userId'])) {
			$output .= '
                     <br>  
                    <div class="card col-sm-3 col-lg-3 col-md-3" dir="rtl" style= "width: 25rem; margin: 1%;">
                        <img src= '. $row['image'].' alt="cake" style="width:100%">
  	                    <h5> '. $row['recipe_name'] .' </h5>
  	                    
  	                    <ul class="list-inline" style="padding-right: 0px;" data-rating="'.$rating.'" title="Average Rating - '.$rating.'" >
                         ';
                         
                         for($count=1; $count<=5; $count++)
                         {
                          if($count <= $rating)
                          {
                           $color = 'color:#ffcc00;';
                          }
                          else
                          {
                           $color = 'color:#ccc;';
                          }
                          $output .= '<li title="'.$count.'" id="'.$row['counter'].'-'.$count.'" data-index="'.$count.'"  data-recipes_counter="'.$row['counter'].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:16px;">&#9733;</li>';
                         }
                         $output .= '
                         </ul>
  	                    
                        <p style=" font-size: small;"> '. $row['recipe_description'] .'</p>
                        <p style=" font-size: medium;"> זמן הכנה: '. $row['recipes_time'] .'</p>
                    	<p style=" font-size: medium;"> רמת קושי: '. $row['recipes_difficulty'] .' </p>';
                        
                       if ($row['recipe_link'] == NULL) {
                             $output .=  '<p><button class="bcard" onclick= "InactiveAlert()" >קרא עוד</button></p>';
                          }
                        else {
                             $output .= '<p><button class="bcard" onclick= window.location="'. $row['recipe_link'] .'";  >קרא עוד</button></p>';
                        }
                      
                
                      $output .=   '
                
                        </div>
                    </div>
                    </br>
			';
            }
            
            else {
               			$output .= '
                     <br>  
                    <div class="card col-sm-4 col-lg-3 col-md-3" dir="rtl" style= "width: 25rem; margin: 1%;">
                        <img src= '. $row['image'].' alt="cake" style="width:100%">
  	                    <h5> '. $row['recipe_name'] .' </h5>
  	                    
                        <p style=" font-size: small;"> '. $row['recipe_description'] .'</p>
                        <p style=" font-size: medium;"> זמן הכנה: '. $row['recipes_time'] .'</p>
                    	<p style=" font-size: medium;"> רמת קושי: '. $row['recipes_difficulty'] .' </p>';

                       if ($row['recipe_link'] == NULL) {
                             $output .=  '<p><button class="bcard" onclick= "InactiveAlert()" >קרא עוד</button></p>';
                          }
                        else {
                             $output .= '<p><button class="bcard" onclick= window.location="'. $row['recipe_link'] .'";  >קרא עוד</button></p>';
                        }
                      
                
                      $output .=   '
            
                
                        </div>
                    </div>
                    </br>
			'; 
            }
		}
		
	}
	
	
	else
	{
		$output = '<h3>אין מתכונים זמינים. נסי/ה בחירה אחרת.  </h3>';
	}
	echo $output;
	
}

?>

