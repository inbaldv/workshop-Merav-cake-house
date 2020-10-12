
	function myFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";}
		}
                        
    function redirectaboutme(){
		window.location="../Includes/aboutme.php";
	}

	function redirectcatalog() {
		window.location="../Includes/catalogPage.php";
	}
	
	function redirectbread() {
		window.location="../PHP/filterRecipes_bread.php";
	}
	
	function redirectdessert() {
		window.location="../PHP/filterRecipes_dessert.php";
	}
	
	function redirectcakes() {
		window.location="../PHP/filterRecipes_cake.php";
	}
		function redirecthomepage() {
		window.location="../Index.php";
	}
	
