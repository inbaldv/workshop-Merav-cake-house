
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
    <script src="bootstrap/js/bootstrap-transition.js"></script>
    
    

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

    
		<div id="wrapper" class="container-fluid">

			<div id="internalWrapper" class="container-fluid">

				<header>
					<div id="header"></div>
				</header>
	
					<br>
        
					<p> התחברות לאתר</P>


                    <center>
						<div class="form-group col-md-9">

							<form action="signUp.php" method="post" style="padding-top:3%;">
                                <div class="container">
                            
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

                                
                                 <button type="submit" class="btn btn-primary container" id= "center" name="signup-submit" style="color: #212529;background-color: #ffcccc;border-color:lavender;padding:15px 30px; font-weight: bold;">התחבר</button>
							     
							</form>
						</div>
					</center>
			             
					<div id="footer"></div>
					
			</div>
		</div>






</body>
</html>