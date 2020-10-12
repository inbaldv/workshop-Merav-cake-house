<?php

session_start();

?>

<!doctype html>
<html lang="en" style="position:relative;">
    
  <head>
  

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/home.css"> 
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="slick/slick.min.js"></script>
	<script type="text/javascript" src="../JS/home.js"></script>
	<script type="text/javascript" src="../JS/facebook.js"></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/js/bootstrap-modal.js"></script>
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    
    <meta name="google-signin-client_id" content="135221622356-lbc7m6ashb0bqiv7fsu656p2ii3sok01.apps.googleusercontent.com">
    

    <style>
    </style>


    <title>Merav's Cake House</title>
    
    <script>					
	    $(function(){
	    $("#footer").load("../Includes/footer.html"); 
	    });
						
	</script>
    
    <script> 
    
        type="text/javascript">
		$(document).ready(function(){
		$('.your-class').slick({
		autoplay: true,
		dots: true,
		arrows: true,
		centerMode:false,
		centerPadding:'60px',
		pauseOnHover:true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplaySpeed: 2000,
		swipeToSlide: true,
		responsive: true,
		mobileFirst:true,
		accessibility:true,
		arrows:true,
		});
		});
	
		function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
		    x.className += " responsive";
		} else {
			x.className = "topnav";
		}
		}
	</script>	
	
	
	
    <script>!function(e,t,a){var c=e.head||e.getElementsByTagName("head")[0],n=e.createElement("script");n.async=!0,n.defer=!0, n.type="text/javascript",n.src=t+"/static/js/chat_widget.js?config="+JSON.stringify(a),c.appendChild(n)}(document,"https://app.engati.com",{bot_key:"99d00c2319994219",welcome_msg:true,branding_key:"default",server:"https://app.engati.com",e:"p" });</script>

  </head>
<body>
    
  <!-- Button trigger sign in modal -->
      <?php
                        
                            if (isset($_SESSION['userId']) ) {
                                
                                echo '
                                    <form action="../PHP/signOut.php" method="post" class="dropdown">
                                     <button type="submit" style="font-weight:lighter; " > התנתק</button>
                                     </form>';
                                }
                            
                                else {
                                    echo '<button type="button" data-toggle="modal" data-target="#signinModal" class="dropdown"
                                    style="font-weight:lighter;">כניסה</button> ';
                                } 
                            

                        ?> 

<div id="wrapper" class="container-fluid">
     

    <div id="internalWrapper" class="container-fluid">
	    <header>
				<img class="logo" src= "../Images/LOGO.jpeg" class="responsive">
	    </header>
			
			<center>
			  <div class="topnav" style="display: grid;" id="myTopnav">
			      
				    <a href="#contact" style="display:none">קצת עליי</a>
				 
			       

				    <div class="dropdown">
				        
                        
                        <div class="dropdown">
				            <form action="../PHP/recipeSearch_php.php" method="post" style="display:flex; flex-direction:row-reverse; padding:3px">
                                <input class="sinput" type="text" size="10" name="recipe_name" placeholder="...חיפוש">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>


					    <button class="dropbtn" onclick="redirectaboutme()">קצת עליי</button>
					    <button class="dropbtn" onclick="redirectcatalog()">להזמנות</button>
					    <button class="dropbtn" onclick="redirectbread()">לחמים</button>
					    <button class="dropbtn" onclick="redirectdessert()">קינוחים</button>
					    <button class="dropbtn" onclick="redirectcakes()">עוגות</button>
					    
				    </div>

				    <a href="javascript:void(0);" style="font-size:10px;" class="icon" onclick="myFunction()">&#9776;</a>
				</div>
		        </center>
		        <!-- Sign in Modal -->
                        <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" dir="rtl">
                          <div class="modal-dialog" role="document" >
                            <div class="modal-content" >
                              <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle" style="text-align: center;font-size: 20px;">ברוך הבא! </h5> 

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
		 
                <main>
              
				    <center><div class="your-class" alt="Nature" id="responsive">
				    <div> <img src="../Images/pic9.jpg" alt="" class="responsive" /></div>
				    <div> <img src="../Images/pic11.jpg" alt="" class="responsive" /></div>
				    <div> <img src="../Images/pic13.jpg" alt="" class="responsive" /></div>
				    <div> <img src="../Images/pic18.jpg" alt="" class="responsive" /></div>
				    <button type="button" data-role="none" class="slick-prev">Previous</button>
				    <button type="button" class="slick-next">Next</button>
				    </div></center>
			  
                    <section>
                        <p class="mt-0">לקוחות מספרות</p>
                            <div class="w3-content w3-display-container">
 				                <div class="mySlides2">
 					                <p class="comment">העוגות הכי טעימות שאכלתי! ממליצה בחום :)</p>
 					                <p class="author">- אילנה לוי</p>
				                </div>
				                
				                <div class="mySlides2" style="display: none;">
 					                <p class="comment">.שירות מצויין! נראה בדיוק כמו בתמונות וטעים. בטוח אזמין שוב</p>
 					                <p class="author">- ג'יין דו</p>
				                </div>
				                
			                    <div class="mySlides2" style="display: none;">
  					                <p class="comment">הלחמים לא מהעולם הזה! הכי טעים שאכלתי. חייבים להזמין</p>
 					                <p class="author">- משה כהן</p>
				                </div>
				                
                                <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1, 1)">&#10094;</button>
                                <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1, 1)">&#10095;</button>
               		        </div>
				
				            <center><video width="300" controls>
				                <source src="../Videos/Merav's Cakes FINAL .mp4" type="video/mp4">
				                </video>
				            </center>
                    </section>
                    
                    
			
                </main>        

                <center>
                    <a dir="rtr" href="https://www.facebook.com/Meravs-Cake-House-2185139985089592/"></a>
                    <img border="0" alt="icon missing" src="../Images/facebook.JPG" width="40px" height="auto">
    
                    <a dir="rtr" href="https://www.instagram.com/meravscakehouse/"></a>
                    <img border="0" alt="icon missing" src="../Images/instegram.JPG" width="40px" height="auto">

                    <img  border="0" alt="icon missing" src="../Images/whatsapp.jpg" width="40px" height="auto"  onclick="redirectwhatsap()"> 
                </center>         
   
                
			
	            <div id="footer"></div>
	</div>
</div>

</body> 

</html>