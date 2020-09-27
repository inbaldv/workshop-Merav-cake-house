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
 
$api_key = '6492cff79f11d7d9fbbf5dd97f780ed2b3285385';
$data['api_key'] = $api_key;
$data['action'] = 'GetCities';
$response = send_post_to_url('https://api.superget.co.il/', $data);
$obj = json_decode($response);
echo "<select>";
for ($i = 0; $i <= 1207; $i++) {
    $city_id = $obj[$i]->city_id;
	$city_name = $obj[$i]->city_name;
	#echo <option value>$city_id."\n";
	echo "<option value>".$city_name."</option>"."\n";
}
echo "</select>";