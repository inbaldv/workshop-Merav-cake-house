

<!DOCTYPE html>
<html>
<head>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="../CSS/orderPage.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src='../JS/header.js'></script>
	<script type="text/javascript" src='../JS/Reciep.js'></script>
  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>!-->
    
    

<style>

#center {
  clear: both;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 50px;
  width: 100px; 
  border: 3px solid green;
}


 
</style>

<title>Merav's Cake House</title>  
	
   
	<script> 
	$(function(){
	$("#header").load("../Includes/header.html"); 
	$("#footer").load("../Includes/footer.html"); 
	});
	</script>
	

  </head>
  
	<body> 
	
	<div id="fb-root"></div>
    <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="i6bL4nys"></script>-->
    
		<div id="wrapper" class="container-fluid">

			<div id="internalWrapper" class="container-fluid">

				<header>
					<div id="header"></div>
				</header>
	
					<br>
        
					<p> התחברות לאתר</P>
					
					<?php
					    
					       if (isset($_GET['error'])){
					        
					       if($_GET['error'] == "invalidemailandname") {
					          echo '<script> alert("שם משתמש ומייל לא תקינים")</script>';
					       } 
					       
					       else if ($_GET['error'] == "invalidemail") {
					          echo '<script> alert("מייל לא תקין")</script>';
					       } 
					       
					       else if ($_GET['error'] == "invalidname") {
					          echo '<script> alert("שם משתמש לא תקין")</script>';
					       } 
					       
					       else if ($_GET['error'] == "passwordcheck") {
					          echo '<script> alert("סיסמא לא נכונה")</script>';
					       } 
					       
					       else if ($_GET['error'] == "usertaken") {
					          echo '<script> alert("שם משתמש תפוס")</script>';
					       }
					       
					       //else if ($_GET['error'] == "sqlerror") {
					       //   echo '<script> alert("שגיאה במסד נתונים")</script>';
					       //} 
					     
					    }
					    
					    else if ($_GET['signup'] == "success") {
					        header ("Location: ../Index.php");
					        exit();
					    }
					
					?>

                    <center>
						<div class="form-group col-md-9">

							<form action="signUp.php" method="post" style="padding-top:3%;">
                                <div class="container">
                                  
                                <!--<script src="https://apis.google.com/js/platform.js" async defer></script>-->
                                <!--<meta name="google-signin-client_id" content="135221622356-lbc7m6ashb0bqiv7fsu656p2ii3sok01.apps.googleusercontent.com">-->
                                
                                
                                <!--<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>-->
                                <!--<script>-->
                                <!-- function onSignIn(googleUser) {-->
                                <!-- var profile = googleUser.getBasicProfile();-->
                                 <!--console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.-->
                                <!-- console.log('Name: ' + profile.getName());-->
                                <!-- console.log('Image URL: ' + profile.getImageUrl());-->
                                 <!--console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.-->
                                <!--}-->
                                <!--</script>-->
                                
                                <!--<div class="fb-login-button" data-size="large" data-button-type="continue_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>-->
                                <!--facebook sign in-->
                                <!--<div id="fb-root"></div>-->
                                <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="aDJ838CH" ></script>-->
                                <!--<div class="fb-login-button" data-size="large" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div>-->
                                
                                <!--<hr>-->
                            
                                <label for="userName"><b>שם משתמש </b></label>
                                <input type="text" placeholder="Enter your name" name="userName" id="userName" require>
                            
                                <label for="userEmail"><b>מייל</b></label>
                                <input type="text" placeholder="Enter Email" name="userEmail" id="userEmail" require>
                            
                                <label for="userPassword"><b>סיסמא</b></label>
                                <input type="password" placeholder="Enter Password" name="userPassword" id="userPassword" require>
                                
                                <label for="repeatPassword"><b>אישור סיסמא</b></label>
                                <input type="password" placeholder="Enter Password" name="repeatPassword" id="repeatPassword" require>
                                
                                <hr>

                    
                            
                              </div>
                              
                                
                              
                              <div class="container" dir="rtl">
                                <p style="font-size: 20px;">כבר יש לך חשבון? <a href="#">הכנס </a></p>
                                </div>
                                <!--<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>-->
                                 <button type="submit" class="btn btn-primary container" id= "center" name="signup-submit" style="color: #212529;background-color: #ffcccc;border-color:lavender;padding:15px 30px; font-weight: bold;">התחבר</button>
							     
							</form>
						</div>
					</center>
			             
					<div id="footer"></div>
					
			</div>
		</div>






</body>
</html>