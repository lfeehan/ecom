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
				<th>Price</th>
				<th>Stock</th>
				<th>Type</th>
				<th>Date</th>
				<th>Supplier</th>
				</tr>
			';
			
			/*
				<th>Description</th>
				<th>Tech Spec</th>
				
			*/
						
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
						echo "€" . $price;
					echo '</td>';
					
					#sets the table color to high-light low stock items
					if($quantity <= 5){
						echo "<td style='background:red;'>";
					}else if($quantity > 5 && $quantity <=10){
						echo "<td style='background:orange;'>";
					}else{
						echo "<td>";	
					}
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
		

			echo "<div class='invoice' style='margin-left:125px;'>";	
			while ($one_row = mysql_fetch_assoc($all_rows)) 
			{
				$order_id = $one_row['order_id'];
				$customer_id = $one_row['customer_id'];
				$order_date = $one_row['order_date'];
				$cart_id = $one_row['cart_id'];
				$cust_details = queryDB("SELECT * FROM customer WHERE customer_id = '{$customer_id}'");
				while ($cust_row = mysql_fetch_assoc($cust_details)) 
				{
					$cust_name = $cust_row['fname'] . " " . $cust_row['sname'];
					$cust_addr = $cust_row['address'];
					$cust_email = $cust_row['email'];
					$cust_payment = $cust_row['payment_method'];
				}
				
				
				echo "
				<table border=0 width=100% class='invoice' style='width:90%;'>
					<tr><td width=250>	<h2 style='margin:0px;'>Panther Kitesurfing</h2>
								Unit 1<br>
								Panther Beach<br>
								Killarney<br>
						</td>
					
						<td align=right><h2 style='margin:0px;'>INVOICE</h2>
						DATE: {$order_date}<br>
						INVOICE: {$order_id}<br>.
						</td>
					</tr>
					
				";
				
				
				echo "<tr>";
				
				echo "<td colspan = 2>
				
				<br>
				<b>Bill To:</b><br>
				{$cust_name}<br>
				{$cust_addr}<br>
				<br>				
				</tr>
				";
				
				echo "
					<tr>
					<td colspan = 2 align=center>
					<br/><br/>
					<table border=1 width = 90% cellspacing=0>
						<tr>	<th>Quantity</th>
							<th>Product</th>
							<th>Unit Price</th>
							<th>Ammount</th>
						</tr>
				";
				
				$total = 0;
				
				$cart = queryDB("select * from cart where cart_id=" . $cart_id);
				while ($cart_row = mysql_fetch_assoc($cart)) 
				{
					$prod_id = $cart_row['prod_id']; 
					$qty = $cart_row['quantity'];
					$name = mysql_fetch_assoc(queryDB("select name, price from products where prod_id =" .$prod_id));
					$prod_name = $name['name'];
					$prod_price = $name['price'];
					
					$line_ammount = $qty * $prod_price;
					$total = $total + $line_ammount;
					echo "	
						<tr>
							<td>{$qty}</td>
							<td>{$prod_name}</td>
							<td>{$prod_price}</td>
							<td>{$line_ammount}</td>
						</tr>	
					";
				}
				
				
				echo "
					<tr>
					<td colspan = 3 align = right>
					<b>TOTAL</b>
					</td>
					<td>
					<b>{$total}</b>
					</td>
					</tr>
				
				</table>
				<br/><br/>
				</td>
				";
				
				
			}
			echo "</td></tr></table>";
			echo "</div>";
		}
		
		?>




<body>

<div id="main-content"> 
<?php include 'breadcrumb.php';?>

<div id="productText">

<b> Administrator Functions </b>
<br/>
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
	

<?php include 'footer.php';?>
