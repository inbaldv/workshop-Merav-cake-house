    <div id="footer">
        <footer class="mt-3 p-1" id="footer">  
            <div class="row">
		        <div class="col-md-4">
                    <div>
                        <h5>הרשמה לניוזלטר</h5>
                         <h6>?רוצים להישאר מעודכנים</h6>
                         <h6>!הירשמו עכשיו</h6>
                         <input type="text" placeholder="שם מלא" name="name" required><br>
                         <input type="text" placeholder="כתובת אימייל" name="mail" required><br>
                         <button class="fb" type="submit" value="Subscribe" onclick="subscribe()" title="לא פעיל">שלח</button>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <h5>שימושי</h5>			 
			        <a class="text-body" href="#" title="לא פעיל">צור קשר</a><br>
                    <a class="text-body" href="../Includes/aboutme.php">אודות</a><br>
			        <a class="text-body" href="#" title="לא פעיל">המרת מידות ומשקלים</a><br>
			        <a class="text-body" href="#" title="לא פעיל">בואו נעבוד ביחד</a>
			    </div>
			    
			    <div class="col-md-4">	
			        <h5>קטגוריות מומלצות</h5>
		            <a class="text-body" href="../PHP/filterRecipes_cake.php">עוגות</a><br>
                    <a class="text-body" href="../PHP/filterRecipes_dessert.php">קינוחים</a><br>
                    <a class="text-body" href="../PHP/filterRecipes_bread.php">לחמים</a><br>
                    <?php
                        
                    if (isset($_SESSION['userId'])) {
				    echo '
					<a class="text-body" href="../Includes/catalogPage.php">ביצוע הזמנה</a><br>';
                    }
                    
                    ?>
                    			  
			    </div>
	    	</div>
        </footer>
    </div>
    
   