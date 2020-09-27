<?php
    require "header.php";
    
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

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

     <title>Merav's Cake House</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/filterRecipes.css" rel="stylesheet">
    
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script type="text/javascript" src='../JS/header.js'></script>
	<script type="text/javascript" src='../JS/Reciep.js'></script>
	<script src="../JS/catalog.js"></script>

  	<script>!function(e,t,a){var c=e.head||e.getElementsByTagName("head")[0],n=e.createElement("script");n.async=!0,n.defer=!0, n.type="text/javascript",n.src=t+"/static/js/chat_widget.js?config="+JSON.stringify(a),c.appendChild(n)}(document,"https://app.engati.com",{bot_key:"99d00c2319994219",welcome_msg:true,branding_key:"default",server:"https://app.engati.com",e:"p" });</script>
  
</head>

<style>
    
    h3 {
       text-align: right;
    }
    
</style>

<body>
    <!-- Page Content -->
    <div class="container" dir="rtl" style="margin-right:5%;">
        
        <p class="pcatalog"> לחמים</P>
        
        <div class="row" style="margin-right: -40px; margin-left: -40px;">
        	<br />
        	<!--<h2 align="center"> סינון </h2>-->
        	<br />
            <div class="col-md-3">                				
					<div style="overflow-y: auto;">		
                <div class="list-group">
					<h3> זמן הכנה </h3>
                    
					<?php
                    
                    $query = "SELECT DISTINCT (recipes_time) FROM recipes ORDER BY recipes_time ASC";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector recipes_time" value="<?php echo $row['recipes_time']; ?>"  > <?php echo $row['recipes_time']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                </div>

				<div class="list-group">
					<h3>רמת קושי</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT(recipes_difficulty) FROM recipes ORDER BY recipes_difficulty ASC
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector recipes_difficulty" value="<?php echo $row['recipes_difficulty']; ?>" > <?php echo $row['recipes_difficulty']; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
                
                <div class="list-group">
					<h3>העדפה קולינרית</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT (parve_or_dairy) FROM recipes 
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector parve_or_dairy" value="<?php echo $row['parve_or_dairy']; ?>" > <?php echo $row['parve_or_dairy']; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                    <?php

                    $query = "
                    SELECT DISTINCT (healthy) FROM recipes WHERE healthy IS NOT NULL
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector healthy" value="<?php echo $row['healthy']; ?>" > <?php echo $row['healthy']; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
				
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">

                </div>
            </div>
        </div>

    </div>
    
<style>
#loading
{
	text-align:center; 
	background: url('../Images/loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'recipesData_bread';
        var recipes_time = get_filter('recipes_time');
        var recipes_difficulty = get_filter('recipes_difficulty');
        var parve_or_dairy = get_filter('parve_or_dairy');
        var healthy = get_filter('healthy');
        $.ajax({
            url:"recipesData_bread.php",
            method:"POST",
            data:{action:action, recipes_time:recipes_time, recipes_difficulty:recipes_difficulty, parve_or_dairy:parve_or_dairy, healthy:healthy},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });



});
</script>

</body>

</html>

<?php
    require "footer.php";
?>
