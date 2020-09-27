<?php
session_start();

$_SESSION["total_price"] = $_POST["Tprice"];

header( 'Location: http://meravalis.mtacloud.co.il/Includes/orderPage.html' ) ;


?>
