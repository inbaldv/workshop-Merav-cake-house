<?php
    require "header.php";
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
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  	<script>!function(e,t,a){var c=e.head||e.getElementsByTagName("head")[0],n=e.createElement("script");n.async=!0,n.defer=!0, n.type="text/javascript",n.src=t+"/static/js/chat_widget.js?config="+JSON.stringify(a),c.appendChild(n)}(document,"https://app.engati.com",{bot_key:"99d00c2319994219",welcome_msg:true,branding_key:"default",server:"https://app.engati.com",e:"p" });</script>
  
</head>

<style>
    
    h3 {
       text-align: right;
    }
    
    #loading
    {
	text-align:center; 
	background: url('../Images/loader.gif') no-repeat center; 
	height: 150px;
    }
    
</style>

<body>
    <!-- Page Content -->
    <div class="container-fluid" dir="rtl" style="">
         <p class="pcatalog" style="font-size: 35px"> קינוחים</p>
         
        <div class="row" style="margin-right:1%;">

            <div class="filter_options col-md-3">                				
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
                    SELECT DISTINCT(recipes_difficulty) FROM recipes WHERE recipes_difficulty='קל'
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
					
                    <?php

                    $query = "
                    SELECT DISTINCT(recipes_difficulty) FROM recipes WHERE recipes_difficulty!='קל' ORDER BY recipes_difficulty ASC
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
                    SELECT DISTINCT (gluten_free) FROM recipes WHERE gluten_free IS NOT NULL
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector gluten_free" value="<?php echo $row['gluten_free']; ?>" > <?php echo $row['gluten_free']; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
                
                <div class="list-group">
					<h3>אביזרים</h3>
                    <?php

                    $query = "
                    SELECT DISTINCT (oven_free) FROM recipes WHERE oven_free IS NOT NULL
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector oven_free" value="<?php echo $row['oven_free']; ?>" > <?php echo $row['oven_free'] ; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                    
                    <?php

                    $query = "
                    SELECT DISTINCT (mixer_free) FROM recipes WHERE mixer_free IS NOT NULL
                    ";
                    $statement = $conn->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector mixer_free" value="<?php echo $row['mixer_free']; ?>" > <?php echo $row['mixer_free'] ; ?> </label>
                    </div>
                    <?php    
                    }

                    ?>
                </div>
				
				
            </div>

            <div class="col-md-9" style="padding-right:2%;">
            	
                <div class="row filter_data">
                    
                    <span id="rating_list" > 
                    
                    <?php if (is_null($_SESSION['userId'])) {
                        echo '<script> alert("התחבר כדי לראות את דירוגי המתכונים ולדרג!") </script>';
                    } ?>
               
                    </span>
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
        var action = 'recipesData_dessert';
        var recipes_time = get_filter('recipes_time');
        var recipes_difficulty = get_filter('recipes_difficulty');
        var parve_or_dairy = get_filter('parve_or_dairy');
        var gluten_free = get_filter('gluten_free');
        var oven_free = get_filter ('oven_free');
        var mixer_free = get_filter ('mixer_free');
        $.ajax({
            url:"recipesData_dessert.php",
            method:"POST",
            data:{action:action, recipes_time:recipes_time, recipes_difficulty:recipes_difficulty, parve_or_dairy:parve_or_dairy, gluten_free:gluten_free,
            oven_free:oven_free,mixer_free:mixer_free},
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

     
    $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var recipes_counter = $(this).data('recipes_counter');
      remove_background(recipes_counter);
      for(var count = 1; count<=index; count++)
      {
       $('#'+recipes_counter+'-'+count).css('color', '#ffcc00');
      }
     });
     
     function remove_background(recipes_counter)
     {
      for(var count = 1; count <= 5; count++)
      {
       $('#'+recipes_counter+'-'+count).css('color', '#ccc');
      }
     }
     
     $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var recipes_counter = $(this).data('recipes_counter');
      var rating = $(this).data("rating");
      remove_background(recipes_counter);
      //alert(rating);
      for(var count = 1; count<=rating; count++)
      {
       $('#'+recipes_counter+'-'+count).css('color', '#ffcc00');
      }
     });
    
    
     $(document).on('click', '.rating', function(){
    //   filter_data();
      var index = $(this).data("index");
      var recipes_counter = $(this).data('recipes_counter');
      $.ajax({
       url:"recipesData_cake.php",
       method:"POST",
       data:{index:index, recipes_counter:recipes_counter},
       success:function(data)
       {
        if(data != 'done')
        {
        
         alert("דירגת "+index +" מתוך 5. ");
         
        }
        
        else
        {
         alert("יש בעיה במערכת.");
        }
       }
      });
      
      
      
     });



});
</script>

</body>

</html>

<?php
    require "footer.php";
?>
