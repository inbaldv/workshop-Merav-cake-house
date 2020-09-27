<?php
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
 
 
 //function GetStoresByCityID($city_id) { 
$city_id=$_POST['mySelect']; 
//echo $_POST['mySelect']; 
$api_key = 'c0c6419e6d62fbbe9db65e3d17c48eeb32a8d25b';
$data['api_key'] = $api_key;
$data['action'] = 'GetStoresByCityID';
$data['city_id'] = $city_id;

$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response);
echo $response;
for ($i = 0; $i <= 1; $i++){
    $store_name = $obj[$i]->store_name;
    $store_id = $obj[$i]->store_id;
    GetPriceByProductID($store_id);
	 //echo  $store_name;
	 //echo $ProductPrice;
	}	


//}
 
 function GetPriceByProductID($store_id){
$api_key = 'c0c6419e6d62fbbe9db65e3d17c48eeb32a8d25b';
$data1['api_key'] = $api_key;
$data1['action'] = 'GetPriceByProductID';
$data1['store_id'] = $store_id;
$data1['product_id'] = array("19006","847","870","583","13366","130222","8727","6191");
$response = send_post_to_url('https://api.superget.co.il/', $data1);
$obj = json_decode($response);
//print_r($obj);
$calc=0;
for ($i = 0; $i <= 7; $i++){
  
    $store_name = $obj[$i]->store_name;
    $product_description= $obj[$i]->product_description;
	$store_product_price= $obj[$i]->store_product_price;
	
	$calc=$obj[$i]->store_product_price+$calc;

	echo $store_name."\n";
	echo $calc;
	//echo $product_description;
	//echo $store_product_price ."\n";
	 //calc($store_name,$store_product_price);

}

}




?>

