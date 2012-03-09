<?php include 'header.php';?>
<?php include 'database.php';?>

<?php
		function viewProductDetails(){
		
			$all_rows = queryDB("select * from products");
		
			echo '<table border =2>
			
				<tr>
				<th>Prod_ID</th>
				<th>Name</th>
				<th>Description</th>
				<th>Tech Spec</th>
				<th>Price</th>
				<th>Stock</th>
				<th>Type</th>
				<th>Date</th>
				<th>Supplier</th>
				</tr>
			';
						
			while ($one_row = mysql_fetch_assoc($all_rows)) {
				
				$prod_id = $one_row['prod_id'];
				$name = $one_row['name'];
				$details = $one_row['details'];
				$description= $one_row['description'];
				$price = $one_row['price'];
				$quantity = $one_row['quantity'];
				
				$type = $one_row['type'];
				$date_added = $one_row['date_added'];
				$supplier_id = $one_row['supplier_id'];
				
				
				echo '<tr>';
				
					echo '<td>';
						echo $prod_id;
					echo '</td>';
					
					echo '<td>';
						echo $name;
					echo '</td>';
												
					echo '<td>';
						echo "<span style=\"font-size: 0.3em;\">";				
						echo $description;
						echo "</span>";
					echo '</td>';
					
					echo '<td>';
						echo "<span style=\"font-size: 0.3em;\">";				
						echo $details;
						echo "</span>";
					echo '</td>';
					
					echo '<td>';
						echo "€" . $price;
					echo '</td>';
					
					echo '<td>';
						echo $quantity;
					echo '</td>';
					
					echo '<td>';
						echo $type;
					echo '</td>';
					
					echo '<td>';
						echo $date_added;
					echo '</td>';
					
					echo '<td>';
						echo $supplier_id;
					echo '</td>';
				
				echo '</tr>';
				
			}
			
			echo '</table>';
		}
		
		
		function viewAllImages(){
			$all_rows = queryDB("select * from product_image");
		
			echo '<table border =2>
			
				<tr>
					<th>Prod_ID</th>
					<th>Image Path</th>
					<th>Image</th>
				</tr>
			';
						
			while ($one_row = mysql_fetch_assoc($all_rows)) {
				
				$prod_id = $one_row['prod_id'];
				$image_id = $one_row['image_id'];
				
				$small_img = resizeImage($image_id, 50, 50);
				
				echo '<tr>';
				
				echo '<td>';
					echo $prod_id;
				echo '</td>';
				
				echo '<td>';
					echo $image_id;
				echo '</td>';
				
				echo '<td>';
					echo "<img src=\"" . $small_img . "\">";
				echo '</td>';
					
				echo '</tr>';
			}
			echo '</table>';			
		}
		
		
		
		
		?>




<body>

<div id="container"> 
<b> admin functions </b>
	<div>
		add product
	</div>

	
	<div>
		view orders
	</div>
	
	<div>
		<?php viewProductDetails(); ?>
		<?php viewAllImages(); ?>
	</div>
	
</div>
<?php include 'footer.php';?>