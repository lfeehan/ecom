<?php
    session_start();
?>
<?php include 'database.php';?>
<?php 
    if(isset($_SESSION['cart'])){
        // do nothing
    }else{
        $_SESSION['cart'] = "";
    }
?>

<?php include 'header.php';?>

<body>

<div id="main-content"> 
<?php include 'breadcrumb.php';?>	
	
<div id="fullpackage">
 	<a href="products.php?beginner=1"><img src="images/pantherpackage.jpg"></a>
</div>
 	
 		
 		
 		<div id="newproducts">
 		<?php 
		//new arrivals vs recently viewed
			$statement = "Recently Viewed";
			
			if (!isset($_COOKIE['view']))
			{
				$statement = "New Products!";
			}
			
			echo $statement;	
			//displaying newprods or recently viewed based on findinf of cookie
						
			if (isset($_COOKIE['view']))
			{
				$var1 = $_COOKIE['view'];	
				$newProds = queryDB("SELECT * FROM products WHERE prod_id='$var1' ORDER BY date_added DESC LIMIT 1");
				$newProds2 = queryDB("SELECT * FROM products ORDER BY date_added DESC LIMIT 1");
			}

			if (!isset($_COOKIE['view']))
			{
				$newProds = queryDB("SELECT * FROM products ORDER BY date_added DESC LIMIT 2");
			}				
					
 			while ($one_row = mysql_fetch_assoc($newProds)) 
				{ 
 				$id= $one_row['prod_id'];
 				$name= $one_row['name'];
 				
 				echo "<div style=\"float: top; padding: 10px; width:175px;\">";
 				
 				#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
 				echo "<a href = \"dynamic_product.php?product=" . $id . "\">" .  $name . "</a>";
 				
 				$image_big = getImage($id);
 				$image_resized = resizeImage($image_big, 250,250);
				echo "<img src =\"" . $image_resized . "\">"; 
				echo "</div>";
				}
			if (isset($newProds2))
			{
			echo "New Products!";
			while ($one_row = mysql_fetch_assoc($newProds2))
				{ 
 				$id= $one_row['prod_id'];
 				$name= $one_row['name'];
 				
 				echo "<div style=\"float: top; padding: 10px; width:175px;\">";
 				
 				#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
 				echo "<a href = \"dynamic_product.php?product=" . $id . "\">" .  $name . "</a>";
 				
 				$image_big = getImage($id);
 				$image_resized = resizeImage($image_big, 250,250);
				echo "<img src =\"" . $image_resized . "\">"; 
				echo "</div>";
				}
 			}
 		?>	
 		
 		</div>

 		<!--prod_type variables are being passed through to the prodcuts.php
 		 page here -->
 		<div id="categories">
     		<div id="kites"> <a href="products.php?prod_type=Kites"><img src="images/categoryImages/kitesurf_kites_button.png"></a></div>
	        <div id="boards"> <a href="products.php?prod_type=Boards"><img src="images/categoryImages/kiteboards_button.png"> </a></div>
	        <div id="boards"> <a href="products.php?prod_type=Surfboards"><img src="images/categoryImages/kite_surfboards_button.png"> </a></div>
     		<div id="boards"> <a href="products.php?prod_type=Harnesses"><img src="images/categoryImages/harnesses_button.png"> </a></div>
     		<div id="accessories"><a href="products.php?prod_type=Accessories"><img src="images/categoryImages/accessories_button.png"></a> </div>
        </div>
 		

 		
 		
 	
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
