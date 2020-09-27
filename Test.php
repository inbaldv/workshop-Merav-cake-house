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
$api_key = '8d17e244994be2e2c03d62290e67765e87dbbb65';
$data['api_key'] = $api_key;
$data['action'] = 'GetStoresByCityID';
$data['city_id'] = $city_id;
$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response);
foreach($obj as $object){
    $store_name = $obj['store_name'];
    $store_id = $obj['store_id'];
    //GetPriceByProductID($store_id);
	 echo  $store_name;
	 echo $ProductPrice;
	}	
//}
//class Store{
	//public $store_name;
	//public $total_price;
//}


//foreach(שם_המערך as משתנה){

//$carts_per_location =(array)$carts_per_location;

//foreach($carts_per_location as $store){
	//$single_store = new Store();
	//$single_store->store_name = $store_name;
	//$single_store->total_price = GetPriceByProductID($store_id);
	
	//array_push($carts_per_location, $single_store);
//}

//echo $carts_per_location;
//}
 
 function GetPriceByProductID($store_id){
	$api_key = '8d17e244994be2e2c03d62290e67765e87dbbb65';
	$data1['api_key'] = $api_key;
	$data1['action'] = 'GetPriceByProductID';
	$data1['store_id'] = $store_id;
	$data1['product_id'] = '870';
	//array("19006","847","870","583","13366","130222","8727","6191");
	$response1 = send_post_to_url('https://api.superget.co.il/', $data1);
	$obj1 = json_decode($response1);
	$total_price=0;
    foreach($obj1 as $object){
    $store_product_Price = $obj['store_product_price'];
    $product_name = $obj['product_name'];
    //$total_price= $total_price+$obj['store_product_price'];
	 echo $store_product_Price;
	 echo $product_name;
	 //echo $total_price;
	}	


}



?>