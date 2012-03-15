<?php
    session_start();
?>
<?php include 'database.php';?>

	<?php
	#had to take the include-database bit out of the header as this needs to be done before the header is called
	#ive updated this across all files...
	#add to cart function taken away from dynamic_product and placed here.
	#this is called on opening the page IF the incoming page passes a product ID
	if (isset($_POST['add'])){
		$prod_id = $_POST['product'];
		addToCart($prod_id);
	}
	?>




<?php include 'header.php';?>


<body>

<div id="main-content"> 
<?php include 'breadcrumb.php';?>


        <?php
        # $_GET takes item_id passed to URL from "Add to Cart" button. 
            $item_id = $_SESSION['cart'];
            

            
            $result = queryDB("SELECT name, details, p.quantity AS stock, price, c.quantity AS quantity
                FROM products p, cart c
                WHERE p.prod_id = c.prod_id AND cart_id = {$item_id}");
                
          while($cart_item = mysql_fetch_assoc($result)){                
            
		$name= $cart_item['name'];
		$price= $cart_item['price'];
		$stock= $cart_item['stock'];
		$details= $cart_item['details'];
                $quantity= $cart_item['quantity'];
 
                echo "<div id=\"container\">";
                    echo "<div>";

                            echo "<p>Item: {$name}<br/>";
                            echo "<p>In Stock: {$stock}<br/>";
                            echo "<p>Details: {$details}<br/>";
                    echo "</div>";
                    echo "<div>";
                            echo "<p>Price: {$price}<br/>";
                            echo "<p>Quantity: {$quantity}<br/>";
                    echo "</div>";
                    echo "<div>";
                            echo "Session cart: {$_SESSION['cart']}";
                    echo "</div>";
                    echo "</hr>";
                echo "</div>";
          }  

 	?>
 		
 	
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
