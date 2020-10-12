<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<?php

    session_start();

    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
	$db = "meravali_CakeHouse";
	
	$conn = new mysqli ($host, $user, $password, $db);
	
	if ($conn-> connect_error) {
	die ("Connection faild: " .$conn->connect_error); }
	
// 	echo "Connection successful";
	

    if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}
    
   

    $userEmailName = $_POST ['userEmailName'];
    $userPwd = $_POST ['userPassword'];
    $url=$_SERVER['HTTP_REFERER'];
    
    
   
   if (empty($userEmailName) || empty($userPwd)) {
    echo '<script> alert("יש למלא את כל השדות!!");  
          window.location.href = document.referrer;
          </script>';
    
    exit();
   }
   
   else {
       $sql = "SELECT * FROM users WHERE userName= ? OR userEmail= ?;";
       $stmt = mysqli_stmt_init ($conn);
       
       if (!mysqli_stmt_prepare($stmt, $sql)) {
          echo '<script> alert("שגיאה!");  
          window.location.href = document.referrer;
          </script>';
         
         exit();
       }
      
       else {
           mysqli_stmt_bind_param ($stmt, "ss",$userEmailName, $userEmailName);
           mysqli_stmt_execute ($stmt);
           $result = mysqli_stmt_get_result($stmt);
           if ($row = mysqli_fetch_assoc($result)) {
               $passwordCheck = password_verify($userPwd, $row['userPassword']);
               
               if($passwordCheck == false) {
                
                echo '<script> alert("סיסמא לא נכונה");  
                window.location.href = document.referrer;
                </script>';
                
                
                
                exit();  
               }
              
               else if ($passwordCheck == true){
                 session_start ();
                 $_SESSION['userId'] = $row['userId'];
                 $_SESSION['userUid'] = $row['userName'];
                
                header ("Location: $url");
                
                exit();
               }
               
               else {
                echo '<script> alert("סיסמא לא נכונה");
                window.location.href = document.referrer;
                </script>';
                
                exit();
               }
           }
           
           else {
             echo '<script> alert("שם משתמש לא תקין");
             window.location.href = document.referrer;
             </script>';
             
             exit();
           }
       }
   }
   


?>
