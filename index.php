<?php include 'header.php';?>
<?php include 'database.php';?>

<body>

<div id="container"> 
<?php include 'breadcrumb.php';?>	
	
<div id="fullpackage">
 	
 	<?php

	#revised to use abstract function
	$all_rows = queryDB("SELECT * FROM products");
	
	#because select * returns multiple rows we must cycle through it.
	#no need for this if select statement returns one row only.
	while ($one_row = mysql_fetch_assoc($all_rows)) { 
		$prod_id= $one_row['PROD_ID'];
		$prod_name= $one_row['PROD_NAME'];
		$prod_price= $one_row['PROD_PRICE'];
		$prod_quantity= $one_row['PROD_QUANTITY'];
		$prod_desc= $one_row['PROD_DESC'];
		
		echo "<div style=\"float: left; padding: 10px; width:200px;\">";
		echo "<p>";
		echo "Product Name: <b>" . $prod_name;
 		echo "</b></p>";
		echo "<p>";
		echo "Price: <b>" . $prod_price;
 		echo "</b></p>";	
		echo "<p>";
		echo "In Stock: <b>" . $prod_quantity;
 		echo "</b></p>";
 		echo "<p>";
		echo "About: <b>" . $prod_desc;
 		echo "</b></p>";
 	 		
 		#get image path for this particular product id
 		$image_loc = getImage($prod_id);
 		#use that image path to resize to 300,300
 		$thumbnail_image = resizeImage($image_loc, 50, 50);
 		
 		#output the resized image, could also output original here
		echo "<p>";
		echo "<img src =\"" . $thumbnail_image . "\">";
		echo "</p>";
		

 	
	echo "</div>";
	
	}
	
	$kites_result = queryDB("SELECT * FROM products WHERE PROD_TYPE='kite'");
 	$kites_name = $kites_result['PROD_NAME'];	
 	
 	$boards_result = queryDB("SELECT*FROM products WHERE PROD_TYPE='board'");
 	$boards_name=$boards_result['PROD_NAME'];
	?>
 		</div>
 		<div id="newproducts">
 		NEW STOCK
 		(2 newest added to database, based on field DATE_ADDED)
 		update your DB with ecom.sql to see
 		
 		<?php
			$newProds = queryDB("SELECT * FROM products ORDER BY DATE_ADDED DESC LIMIT 2");
			
		
 			while ($one_row = mysql_fetch_assoc($newProds)) { 
 				$prod_id= $one_row['PROD_ID'];
 				$prod_name= $one_row['PROD_NAME'];
 				
 				echo "<div style=\"float: top; padding: 10px; width:175px;\">";
 				
 				#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
 				echo "<a href = \"http://localhost/ecom/dynamic_product.php?product=" . $prod_id . "\">" .  $prod_name . "</a>";
 				
 				$image_loc = getImage($prod_id);
 				
				echo "<img src =\"" . $image_loc . "\">"; 
				echo "</div>";
 			}
 		?>	
 		
 		</div>
 		<div id="kites"> <a href="products.php?prod_type=Kites">Kites</a><?php  echo "kites go here :".$kites_name ?></div>

 		
 		
 		
 		
 		

 		<div id="boards"><?php echo "boards go here :".$boards_name ?> </div>
 		<div id="accessories"><?php echo "accessories go here"?> </div>
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
