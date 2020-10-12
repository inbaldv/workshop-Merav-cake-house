<?php 

session_start();

?>

<!doctype html>
<html lang="en" style="position:relative;">
  <head>
  

    <!-- CSS -->
    <!--<link rel="stylesheet" type="text/css" href="../CSS/home.css"> -->
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<script type="text/javascript" src="../JS/home.js"></script>
	

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    


<div id="header" class="container-fluid">
	    <header>
				<img class="logo" src= "../Images/LOGO.jpeg" class="responsive">
				
					
				<div class="topnav" style="margin-left:30%" id="myTopnav">
					<a href="#contact" style="display:none">קצת עליי</a>
				    
				   	<div class="dropdown" style="left: -17px;"> 
				    
				    <!-- Button trigger sign in modal -->
                        <?php
                        
                            if (isset($_SESSION['userId'])) {
                                

                                //echo '<p class="dropdown" style="margin:15px; font-weight:bold; padding: 1px 20px; dir="rtl"> שלום,  '.$users["userName"].' </p>
                                echo '
                                <form action="signOut.php" method="post">
                                <button type="submit" class="dropbtn" > התנתק</button>
                                </form>';
                                }
                                else {
                                    echo '<button type="button" data-toggle="modal" data-target="#signinModal" 
                                    class="dropbtn" >כניסה</button> ';
                                }
                            

                        ?>
                        </div>

					 <?php
                        
                    if (isset($_SESSION['userId'])) {
				    echo '
					<div class="dropdown">
						<button class="dropbtn" onclick="redirectcatalog()">להזמנות</button>
				  	</div> ';
                    }
                    
                    ?>
				  	
				  	<div class="dropdown">
						<button class="dropbtn" onclick="redirectbread()">לחמים</button>
				  	</div> 
				  	
				  	<div class="dropdown">
						<button class="dropbtn" onclick="redirectdessert()">קינוחים</button>
				  	</div> 
					 
					 <div class="dropdown">
						<button class="dropbtn" onclick="redirectcakes()">עוגות</button>
				  	</div> 
				
					<div class="dropdown">
						<button class="dropbtn" onclick="redirectaboutme()">קצת עליי</button>
					</div>
					
                    <div class="dropdown">
						<button class="dropbtn" onclick="redirecthomepage()">דף הבית</button>
					</div> 
				    

				    
			
					<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
                  
				</div>
			
		</header>
		
		 <!-- Sign in Modal -->
                        <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" dir="rtl">
                          <div class="modal-dialog" role="document" >
                            <div class="modal-content" >
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center; font-size: 25px;">ברוך הבא! </h5> 
                                <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                                <!--  <span aria-hidden="true">&times;</span>-->
                                <!--</button>-->
                              </div>
                              <div class="modal-body">
                        
                            <form action="../PHP/signIn.php" method="post">
                            <div class="container">

                                <label for="userEmailName" style="float:right;" ><b>שם משתמש/מייל</b></label>
                                <input type="text" placeholder="Enter Email/Name" name="userEmailName" id="userEmailName" 
                                style="width: 100%; padding: 9px; margin: 5px; display: inline-block; border: none;
                                background: #f1f1f1;" required>
      
                                <label for="userPassword" style="float:right;" ><b>סיסמא</b></label>
                                <input type="password" placeholder="Enter Password" name="userPassword" id="userPassword" 
                                style="width: 100%; padding: 9px; margin: 5px; display: inline-block; border: none;
                                background: #f1f1f1;" required>
                            
                                <hr>
                                
                            
                              </div>
                              
                                
                              
                              <div class="container signin" dir="rtl">
                                <p style="font-size:15px;"> אין לך חשבון? <a href=../PHP/signUp1.php>הרשם </a></p>
                                </div>
                                
                                <div class="modal-footer" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" name="signin-submit" style="color: #212529;background-color: #ffcccc;border-color:lavender;padding:"><b>התחבר</b></button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><b>סגור</b></button>
                                  </div>
                                  
                             </form>
                             </div>
                              
                              
                            </div>
                          </div>
                        </div>
    	   
</div>
   