<?php

    // if (isset ($POST ['signup-submit'])) {

    session_start();


    $host="localhost";
	$user = "meravali_meraval";
	$password = "MDT1707";
	$db = "meravali_CakeHouse";
	
	$conn = new mysqli ($host, $user, $password, $db);
	
	if ($conn-> connect_error) {
	die ("Connection faild: " .$conn->connect_error); }
	
	echo "Connection successful";
	

    if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}
    
   
    $userName = $_POST ['userName'];
    $userEmail = $_POST ['userEmail'];
    $userPassword = $_POST ['userPassword'];
    $repeatPassword = $_POST['repeatPassword'];
    
    // if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($repeatPassword)) {
    //     header ("Location: signUp1.php?error=emptyfields&userName=" .$userName. "&mail=" .$userEmail);
    //     exit();
    // } else
    
    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9א-ת]*$/", $userName)) {
        header ("Location: signUp1.php?error=invalidemailandname");
        exit();
    }
    
    else if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
       header ("Location: signUp1.php?error=invalidemail&=userName=" .$userName);
       exit();
    }
   
    else if (!preg_match("/^[a-zA-Z0-9א-ת]*$/", $userName)) {
      header ("Location: signUp1.php?error=invalidname&=userEmail=" .$userEmail);
      exit();
    }
    
    else if ($userPassword !== $repeatPassword) {
        header ("Location: signUp1.php?error=passwordcheck&=&=userName" .$userName. "&userEmail=" .$userEmail);
      exit();
    }
    
    /*check if the user name already exist and avoid SQL injection*/
    else {
    
    $sql = " SELECT userName FROM users WHERE userName=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header ("Location: signUp1.php?error=sqlerror");
        exit();
    }
    
    else {
        mysqli_stmt_bind_param($stmt, "s", $userName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
         header ("Location: signUp1.php?error=usertaken&=userEmail" .$userEmail);
        exit();
        }
        
        else {
             $sql = "INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?)";
             $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
            header ("Location: signUp1.php?error=sqlerror");
            exit();
        }
        else {
            
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt, "sss", $userName, $userEmail, $hashedPassword);
            mysqli_stmt_execute($stmt);
            header ("Location: signUp1.php?signup=success");
            exit();
        }
        
    }
    
    }
    
    }

    mysqli_stmt_close($stmt);
    mysqli_close ($conn);
    
// }

// else {
    
//     echo failed;
//     // header ("Location: signUp1.php");
//     // exit();
// }


    // fb creds
//	 define( 'FB_APP_ID', '808605256550695' );
//	 define( 'FB_APP_SECRET', '16ed4e523a054dbacf32820e713b3539' );
//	 define( 'FB_REDIRECT_URI', 'https://meravalis.mtacloud.co.il/Index.php' );

    
?>