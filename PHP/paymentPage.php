<!doctype html>
<html lang="en">
  <head>
  
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../CSS/header.css">
	<link rel="stylesheet" type="text/css" href="../CSS/footer.css">
	<link rel="stylesheet" type="text/css" href="../CSS/paymentPage.css">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
	<!-- JS -->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script type="text/javascript" src='../JS/header.js'></script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
        
				<p> עמוד תשלום</p>

				<div class="form-row">
					<div class="form-group col-md-8">
						<form class="form"  action="action_page.php" method="post" id="form" onsubmit="redirectfinal()">
							<div class="form-group col-md-12">
								<label for="fname">שם בעל הכרטיס</label>
								<input onkeypress="checkInputs()" type="text" class="form-group" id="ссname" placeholder="שם בעל הכרטיס" required>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error message</small>
							</div>
      
							<div class="form-group col-md-12">
								<label for="inputAddress">מספר תעודת זהות</label>
								<input onkeypress="checkInputs()" type="number" class="form-group" id="ccid" placeholder="111111111" pattern="[0-9]{9}" required>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error message</small>
							</div>
  
							<div class="form-group col-md-12">
								<label for="inputAddress">מספר כרטיס אשראי</label>
								<input onkeypress="checkInputs()" type="number" class="form-group" id="ccnum" placeholder="מספר כרטיס אשראי" pattern="[0-9]{8,18}" required>
								<i class="fas fa-check-circle"></i>
								<i class="fas fa-exclamation-circle"></i>
								<small>Error message</small>
							</div>
  
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="inputZip">תוקף</label>
									<input onkeypress="checkInputs()" type="month" class="form-group" id="ccdate" placeholder="" required >
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<small>Error message</small>
								</div>
  
								<div class="form-group col-md-6">
									<label for="inputCity">CVV</label>
									<input onkeypress="checkInputs()" type="number" class="form-group" id="cvv" placeholder="325"  pattern="[0-9]{3}" required>
									<i class="fas fa-check-circle"></i>
									<i class="fas fa-exclamation-circle"></i>
									<small>Error message</small>
								</div>
							</div>
    
							<button type="submit" value="submit" onclick="redirectfinal()">ביצוע הזמנה</button>
    
						</form>
					</div>

					<div class="container col-lg-3 ">
						<h4>קופה <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
                        <hr>
						<p><span style="color:black;font-size:20px" ><b>
						<?php 
                           echo "₪ עלות ההזמנה לאחר 25% הנחה הינה ".$_COOKIE["total_price"];
                         ?>
                        </b></span></p>
					</div>
				</div>
               
                
				<div id="footer"></div>
				
			</div>
		</div>
		
		  <script src="../JS/paymentPage.js"></script>

	</body>             
</html>

