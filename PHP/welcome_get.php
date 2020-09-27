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
 

 /** Since you reference action on `form action` then value of $_GET['action'] will be contact_agent */
$action = $_GET['action'];
echo  $_GET['action'];

/** Value of $_POST['agent_id'] will be selected option value */
$agent_id = $_POST['mySelect']; 
echo $_POST['mySelect']; 




 
$ProductID=array("19006","847","870","583","13366","130222","8727","6191");

function GetPriceByProductID($store_id,$ProductID) { 

$api_key = 'ce72e832f2f0328f05baecf344b9191d2f83fd30';
$data['api_key'] = $api_key;
$data['action'] = 'GetPriceByProductID';
$data['store_id'] = $store_id;
$data[$ProductID] = $ProductID;
$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response);
#$city_id = $obj[0]->city_id;
#echo  $store_name;
#echo $ProductPrice;

foreach ($ProductID as $product)
{
    
  $ProductPrice= $obj[0]->productPrice;
 
}
}
?>