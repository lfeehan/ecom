<?php
    session_start();
?>

<?php include 'header.php';?>

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
 		#this takes the php?product=xxx value of xxx, this will reference the product we will display this page for
		#$url_id = $_GET['product'];
		if (isset ($_GET['product'])){
		$url_id = $_GET['product'];
		}
		else{
		$url_id = 1;
		}		
		
		#this makes a cookie to diplay on homepage as recently viewed
		if (isset ($_GET['product']))
			{
			$view_id = $_GET['product'];
			setcookie('view', $view_id, time() + (60*60*24*2));
			}
			else{}
 					
		#sql query
		
		$all_rows=queryDB("SELECT * FROM products WHERE prod_id='$url_id'");
		while($one_row=mysql_fetch_assoc($all_rows)) {
		$id= $one_row['prod_id'];
		$name= $one_row['name'];
		$name_long=$one_row['name_long'];
		$price= $one_row['price'];
		$quantity= $one_row['quantity'];
		$details= $one_row['details'];
		$description=$one_row['description'];
		$prod_type=$one_row['type'];
				
				
						
			$SQL2 = "SELECT image_id FROM product_image WHERE prod_id = \"" . $id . "\"";
			$result2 = mysql_query($SQL2);
			while ($image_field = mysql_fetch_assoc($result2)){
				$image_loc= $image_field['image_id'];
				//echo "<p>";
				//echo "<img src =\"" . $image_loc . "\">";
				//echo "</p>";
			}
		}
	
	?> 
<body>
<div id="container"> 
<?php include 'breadcrumb.php';?>	
  
 <div id="productText"> 	
	 
    <div id="leftdiv">
    				<?php echo "<p>";
					echo "<img src =\"" . $image_loc . "\">";
					echo "</p>";
					?>
    </div>
    <div id="middiv">
    </div>
  <a href="index.php">Home</a>
    <div id="rigthdiv">
    	<div class="prodinfo">
        		<?php 
				echo "<p>";
				echo "Name: <b>" . $name;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
       			<?php 
				echo "<p>";
				echo "Price: <b>" . $price;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
      			<?php 
				echo "<p>";
				echo "In stock: <b>" . $quantity;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
        		<?php 
				echo "<p>";
				echo "Details: <b>" . $details;
				echo "</b></p>";?>
        </div>
        <div class="addtocart">
        		<?php 
			$prod_id = $_GET['product'];
                        # echo $prod_id;
                        ?>
            <form action="shopping_cart.php" method="post" >
                <input type="submit" name="addtocart" value="Add to Cart" onclick="<?php addToCart($prod_id);?>">
            <!--<input type="submit" name="addtocart" value="Add to Cart" onclick="<?php # insertCart(1001, $prod_id, 1);?>"> -->
          </form>
        </div>
    </div>
    <div id="description">
    <?php echo $description; ?>
    Let's go sit... out on the decking. Description
    </div>

 </div>	<!-- productText close div -->
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html
