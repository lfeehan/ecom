<?php include 'header.php';?>
<?php include 'database.php';?>

<body>

<div id="container"> 
<?php include 'breadcrumb.php';?>	
	
<div id="fullpackage">
 	<! 
SQL Tables 	
products
prod_id, name, name_long, price, quantity, details, description, type, date_added, supplier_id

product_image
prod_id, image_id

orders
order_id, customer_id, order_date, cart_id, completed

cart
cart_id, prod_id, quantity

customer
customer_id, fname, sname, address, email, payment_method
 	 ->
 	<?php

	#revised to use abstract function
	$all_rows = queryDB("SELECT * FROM products");
	
	#because select * returns multiple rows we must cycle through it.
	#no need for this if select statement returns one row only.
	while ($one_row = mysql_fetch_assoc($all_rows)) { 
		$id= $one_row['prod_id'];
		$name= $one_row['name'];
		$name_long=$one_row['name_long'];
		$price= $one_row['price'];
		$quantity= $one_row['quantity'];
		$details= $one_row['details'];
		$description=$one_row['description'];
		
		
		echo "<div style=\"float: left; padding: 10px; width:200px;\">";
		echo "<p>";
		echo "Product Name: <b>" . $name;
 		echo "</b></p>";
		echo "<p>";
		echo "Price: <b>" . $price;
 		echo "</b></p>";	
		echo "<p>";
		echo "In Stock: <b>" . $quantity;
 		echo "</b></p>";
 		echo "<p>";
		echo "About: <b>" . $details;
 		echo "</b></p>";
 	 		
 		#get image path for this particular product id
 		$image_loc = getImage($id);
 		#use that image path to resize to 300,300
 		$thumbnail_image = resizeImage($image_loc, 50, 50);
 		
 		#output the resized image, could also output original here
		echo "<p>";
		echo "<img src =\"" . $thumbnail_image . "\">";
		echo "</p>";
		

 	
	echo "</div>";
	
	}
	
	$kites_result = queryDB("SELECT * FROM products WHERE type='kite'");
 	$kites_name = $kites_result['name'];	
 	
 	$boards_result = queryDB("SELECT*FROM products WHERE type='board'");
 	$boards_name=$boards_result['name'];
	?>
 		</div>
 		<div id="newproducts">
 		<h1>New Arrivals!</h1>
 		
 		<?php
			$newProds = queryDB("SELECT * FROM products ORDER BY date_added DESC LIMIT 2");
			
		
 			while ($one_row = mysql_fetch_assoc($newProds)) { 
 				$id= $one_row['prod_id'];
 				$name= $one_row['name'];
 				
 				echo "<div style=\"float: top; padding: 10px; width:175px;\">";
 				
 				#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
 				echo "<a href = \"dynamic_product.php?product=" . $id . "\">" .  $name . "</a>";
 				
 				$image_loc = getImage($id);
 				
				echo "<img src =\"" . $image_loc . "\">"; 
				echo "</div>";
 			}
 		?>	
 		
 		</div>

 		<!--prod_type variables are being passed through to the prodcuts.php
 		 page here -->
 		<div id="categories">
     		<div id="kites"> <a href="products.php?prod_type=Kites"><img src="images/categoryImages/kitesurf_kites_button.png"></a></div>
	        <div id="boards"> <a href="products.php?prod_type=Boards"><img src="images/categoryImages/kiteboards_button.png"> </a></div>
	        <div id="boards"> <a href="products.php?prod_type=surfboard"><img src="images/categoryImages/kite_surfboards_button.png"> </a></div>
     		<div id="boards"> <a href="products.php?prod_type=harness"><img src="images/categoryImages/harnesses_button.png"> </a></div>
     		<div id="accessories"><a href="products.php?prod_type=accessories"><img src="images/categoryImages/accessories_button.png"></a> </div>
        </div>
 		

 		
 		
 	
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
