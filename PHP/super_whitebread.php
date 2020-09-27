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

function GetPriceByProductID($store_id){
    $api_key = 'cdff2015d9827f24c09bd5a3cacc3c6eb4703d9a';
    $data3['api_key'] = $api_key;
    $data3['action'] = 'GetPriceByProductID';
    $data3['store_id'] =$store_id;
    $data3['product_id'] = array('9000','8727','2631','106','341642');
    $result= send_post_to_url('https://api.superget.co.il/', $data3);
    $obj3 = json_decode($result,TRUE);
  // echo $result;
    $total_price=0;
    for($i = 0; $i <=4; $i++){
       
    
         $store_product_price= $obj3[$i]['store_product_price'];
        //$calc=$obj3[$i]['store_product_price']+$calc;
        $total_price += (float)$store_product_price;
        //echo $obj3[$i]['store_product_price']."<br/>";
      
    }
    
         return $total_price;
  
}

function GetMissingProductID($store_id){
    $api_key = 'cdff2015d9827f24c09bd5a3cacc3c6eb4703d9a';
    $data3['api_key'] = $api_key;
    $data3['action'] = 'GetPriceByProductID';
    $data3['store_id'] =$store_id;
    $data3['product_id'] = array('9000','8727','2631','106','341642');
    $result= send_post_to_url('https://api.superget.co.il/', $data3);
    $obj3 = json_decode($result,TRUE);
   // echo $result;
    $total_price=0;
    $count=0;
    for($i = 0; $i <=4; $i++){
       
    if ($obj3[$i]['product_id']==null)
    {
        $count++;
       // $proudct=
        
        
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
$api_key = 'cdff2015d9827f24c09bd5a3cacc3c6eb4703d9a';
$data['api_key'] = $api_key;
$data['action'] = 'GetStoresByCityID';
$data['city_id'] = $city_id;
$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response,TRUE);
//GetPriceByProductID('108');
//echo $response;

$all_stores_prices=(object)[];
   echo "<div><table><tr><th> רשת</th><th>שם חנות</th><th>כתובת חנות</th><th>מחיר סל הקניות</th><th>מס' מוצרים חסרים</th></tr>";
  	  //	 echo "<div><table><tr><th> רשת</th><th>שם חנות</th><th>כתובת חנות</th><th>מחיר סל הקניות</th><th>מס' מוצרים חסרים</th><th>נווט</th></tr>";


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
     
    //echo "{";
  //  echo "שם החנות: ".$chain_name." ";
 //   echo $store_name . ", ";
//	echo "כתובת החנות: ".$store_address.", ";
	//echo $store_id;
  //  echo "מחיר סל הקניות: ".  $store_price;
  //  echo "חוסרים: ". $count;
  //	echo "<br/>";
  	
  echo "<tr><td>".$chain_name."</td><td>".$store_name."</td><td>".$store_address."</td><td>".$store_price."</td><td>".$count."</td></tr>";

// echo "<tr><td>".$chain_name."</td><td>".$store_name."</td><td>".$store_address."</td><td>".$store_price."</td><td>".$count."</td><td><a href="https://waze.com/ul?q=$store_address"."</a></td></tr>";


    
  	//echo  $all_stores_prices;
  	//array_push($all_stores_prices, (object)
    //  'store_name' => $store_name,
    //'store_price' =>   $store_price,
    
}
     echo "</table></div>";

       
	
  /*	echo "סל הקניות הזול ביותר הוא "
  	




/*function CheapestShoppingCart($all_stores_prices)
{
    
   $n = count($all_stores_prices);  
   $min = $all_stores_prices[0]->'store_price'; 
   foreach ( $all_stores_prices as $store) { 
       if ($min >  $all_stores_prices[0]->'store_price') 
           $min =  $all_stores_prices[0]'store_price'; 
    return $min, ;        
    
}*/ 

//$api_key = '8d17e244994be2e2c03d62290e67765e87dbbb65';
//$data['api_key'] = $api_key;
//$data['action'] = 'GetCityByName';
//$data['city_name'] = 'אשדוד';
//$response = send_post_to_url('https://api.superget.co.il/', $data);
//$obj = json_decode($response);
//$city_id = $obj['city_id'];
  //  $store_name = $obj['store_name'];

//echo $city_id;
 
 
//$data2['api_key'] = $api_key;
//$data2['action'] = 'GetStoresByCityID';
//$data2['city_id'] = $city_id;
//$response2 = send_post_to_url('https://api.superget.co.il/', $data2);
//echo $response2;
//$obj2 = json_decode($response2);






//


//$store_name= $obj2[0]->store_name;
//$store_name2= $obj2[1]->store_name;

//$city_name=$obj2[0]->city_name;
//chain_name
//store_address

//echo $store_name. '/n';
//echo $store_name2. '/n';






//echo $city_name;

//foreach($obj2 as $object){
  //  $store_name = $obj['store_name'];
    //$store_id = $obj['store_id'];
    //GetPriceByProductID($store_id);
	 //echo  $store_name;
	 //echo $ProductPrice;
	//}	





?>

<br>
<br>

        <div id="footer"></div>
    
    </div>
</div>
</body>
</html>