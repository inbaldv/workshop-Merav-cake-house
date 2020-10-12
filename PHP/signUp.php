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
    
   
    $userName = $_POST ['userName'];
    $userEmail = $_POST ['userEmail'];
    $userPassword = $_POST ['userPassword'];
    $repeatPassword = $_POST['repeatPassword'];
    $url=$_SERVER['HTTP_REFERER'];
    
    
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9א-ת]*$/", $userName)) {
        echo '<script> alert("שם המשתמש והמייל לא תקינים.");
          window.location.href = document.referrer;
          </script>';
        exit();
    }
    
    else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
       echo '<script> alert("מייל לא תקין.");
          window.location.href = document.referrer;
          </script>';
       exit();
    }
   
    else if (!preg_match("/^[a-zA-Z0-9א-ת]*$/", $userName)) {
      echo '<script> alert("שם המשתמש לא תקין.");
          window.location.href = document.referrer;
          </script>';
      exit();
    }
    
    else if ($userPassword !== $repeatPassword) {
        echo '<script> alert("סיסמא לא נכונה.");
          window.location.href = document.referrer;
          </script>';
      exit();
    }
    
    /*check if the user name already exist and avoid SQL injection*/
    else {
    
    $sql = " SELECT userName FROM users WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo '<script> alert("שגיאה!");
          window.location.href = document.referrer;
          </script>';
        exit();
    }
    
    else {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
         echo '<script> alert("שם המשתמש תפוס, נסה שם אחר.");
          window.location.href = document.referrer;
          </script>';
        exit();
        }
        
        else {
             $sql = "INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?)";
             $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo '<script> alert("שגיאה!");
              window.location.href = document.referrer;
              </script>';
            exit();
        }
        else {
            
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $userName, $userEmail, $hashedPassword);
            mysqli_stmt_execute($stmt);
            header ("Location: $url");
            exit();
        }
        
    }
    
    }
    
    }

    mysqli_stmt_close($stmt);
    mysqli_close ($conn);
    

    
?>