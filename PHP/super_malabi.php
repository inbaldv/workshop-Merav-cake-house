<?php
    session_start();
    require "../Includes/recipes_header.php"
?>

<!DOCTYPE html>
<html>
<head>
    
	<!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="../CSS/SuperGet.css">
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
	
 <!--   <script> -->
	<!--$(function(){-->
	<!--$("#header").load("../Includes/header.html"); -->
	<!--$("#footer").load("../Includes/footer.html"); -->
	<!--});-->
	<!--</script>-->
    
</head>
<body>
    
<div id="wrapper" class="container-fluid">
	<div id="internalWrapper" class="container-fluid">
                <header>
					<div id="header"></div>
				</header>



<?php

function GetPriceByProductID($store_id){
    $api_key = 'c06d39d384a1d06b2a1380b018d4ceedb857766e';
    $data3['api_key'] = $api_key;
    $data3['action'] = 'GetPriceByProductID';
    $data3['store_id'] =$store_id;
    $data3['product_id'] = array('6040','8727','55799','25198','9784');
    $result= send_post_to_url('https://api.superget.co.il/', $data3);
    $obj3 = json_decode($result,TRUE);
    $total_price=0;
    for($i = 0; $i <=4; $i++){
       
    
         $store_product_price= $obj3[$i]['store_product_price'];
        $total_price += (float)$store_product_price;

      
    }
    
         return $total_price;
  
}

function GetMissingProductID($store_id){
    $api_key = 'c06d39d384a1d06b2a1380b018d4ceedb857766e';
    $data3['api_key'] = $api_key;
    $data3['action'] = 'GetPriceByProductID';
    $data3['store_id'] =$store_id;
    $data3['product_id'] = array('6040','8727','55799','25198','9784');
    $result= send_post_to_url('https://api.superget.co.il/', $data3);
    $obj3 = json_decode($result,TRUE);
    $total_price=0;
    $count=0;
    for($i = 0; $i <=4; $i++){
       
    if ($obj3[$i]['product_id']==null)
    {
        $count++;
 
    }
    
      
    }
    
    return  $count;
}

function send_post_to_url($url,$post) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    $return = curl_exec($ch);
    curl_close($ch);
    return $return;
}

$city_id=$_POST['mySelect']; 
$_POST['mySelect']; 
$api_key = 'c06d39d384a1d06b2a1380b018d4ceedb857766e';
$data['api_key'] = $api_key;
$data['action'] = 'GetStoresByCityID';
$data['city_id'] = $city_id;
$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response,TRUE);

echo "<div><table><tr><th> רשת</th><th>שם חנות</th><th>כתובת חנות</th><th>מחיר סל הקניות</th><th>מס' מוצרים חסרים</th><th>נווט</th></tr>";



for ($i = 0; $i <= 6; $i++){
    
    $store_name = $obj[$i]['store_name'];
    $chain_name=$obj[$i]['chain_name'];
    $store_address=$obj[$i]['store_address'];
    $store_id=$obj[$i]['store_id'];
    $store_price=GetPriceByProductID($store_id);
    $count=GetMissingProductID($store_id);
         if ($store_address=="unknown" )
    {
        $store_address='כתובת החנות לא זמינה כעת';
    }
     
$src="../Images/waze.jpg";
$height_img="height=50";
$width_img="width=50";

  	
  	
$waze_link="https://waze.com/ul?q=$chain_name%20$store_name%20$city_name%20$store_address";
  

echo "<tr><td>".$chain_name."</td><td>".$store_name."</td><td>".$store_address."</td><td>".$store_price."</td><td>".$count."</td><td><a href=".$waze_link."><img src=$src $height_img $width_img></a></td></tr>";

  	


    
}
     echo "</table></div>";

       





?>

<br>
<br>

        <!--<div id="footer"></div>-->
    
    </div>
</div>
</body>
</html>

<?php
    require "../PHP/footer.php"
?>