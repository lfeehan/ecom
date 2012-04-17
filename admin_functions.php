<?php include 'database.php';?>
<?php include 'header.php';?>

<?php
		function viewProductDetails()
		{
		
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
						
			while ($one_row = mysql_fetch_assoc($all_rows)) 
			{
				
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
		
		
		function viewAllImages()
		{
			$all_rows = queryDB("select * from product_image");
		
			echo '<table border =2>
			
				<tr>
					<th>Prod_ID</th>
					<th>Image Path</th>
					<th>Image</th>
				</tr>
			';
						
			while ($one_row = mysql_fetch_assoc($all_rows)) 
			{
				
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
		
		function viewOrders()
		{
			$all_rows = queryDB("select * from orders");
		
			echo '<table border =2>
			
				<tr>
					<th>Order ID</th>
					<th>Customer ID</th>
					<th>Cart ID</th>
					<th>Order Date</th>
				</tr>
			';
			
			while ($one_row = mysql_fetch_assoc($all_rows)) 
			{
				$order_id = $one_row['order_id'];
				$customer_id = $one_row['customer_id'];
				$order_date = $one_row['order_date'];
				$cart_id = $one_row['cart_id'];
				
				echo '<tr>';
				
				echo '<td>';
					echo $order_id;
				echo '</td>';
				
				echo '<td>';
					echo $customer_id;
				echo '</td>';
				
				echo '<td>';
					echo $cart_id;
				echo '</td>';
				
				echo '<td>';
					echo $order_date;
				echo '</td>';
				echo '</tr>';
				
				echo '<tr>';
				
				echo "<td align = right colspan = \"4\">";
				$cart = queryDB("select * from cart where cart_id=" . $cart_id);
				
				while ($cart_row = mysql_fetch_assoc($cart)) 
				{
					$prod_id = $cart_row['prod_id']; 
					$qty = $cart_row['quantity'];
					$name = mysql_fetch_assoc(queryDB("select name from products where prod_id =" .$prod_id));
					$prod_name = $name['name'];
					
					echo $prod_name . " -  qty: " . $qty;
					echo "</br>";
				}
				
				echo '</td>';
				
				echo "</tr>";
				
				
			}
			echo '</table>';
			
		}
		
		
		?>




<body>

<div id="container"> 
<b> admin functions </b>
	<div>
		<?php
		
			echo "<form name=\"input\" action=\"admin_functions.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"products\" value=\"true\">";
			echo "<input type=\"submit\" value=\"view all products\">";
			echo "</form>";
			
			echo "<form name=\"input\" action=\"admin_functions.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"images\" value=\"true\">";
			echo "<input type=\"submit\" value=\"view all images\">";
			echo "</form>";
			
			echo "<form name=\"input\" action=\"admin_functions.php\" method=\"POST\">";
			echo "<input type=\"hidden\" name=\"orders\" value=\"true\">";
			echo "<input type=\"submit\" value=\"view all orders\">";
			echo "</form>";
	
			#insertCart(1002, 201, 2);
			
		?>
	</div>

	
	
	<div>
		<?php
		if (isset($_POST['products']))
		{
			viewProductDetails();
		}
		if (isset($_POST['images']))
		{
			viewAllImages();
		}
		if (isset($_POST['orders']))
		{
			viewOrders();
		}
		
		?>
	</div>
	
</div>
<?php include 'footer.php';?>
