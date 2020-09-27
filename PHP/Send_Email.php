<?php
$to = $_POST['email'];
$subject = "רשימת הקניות שלי";
$txt = "favorit";
$headers = "From: Meravcakehouse@gmail.com" . "\r\n" .





	if ($_POST){ 
		if (empty($_POST['email']))
			echo 'email is missing';
		else{
			$name=$_POST['email'];
        			echo 'Hello '.$name;
        			mail($to,$subject,$txt);
		}
	}

?>