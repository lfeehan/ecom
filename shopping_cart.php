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
            

            
            $result = queryDB("SELECT p.prod_id AS prod_id, name, details, p.quantity AS stock, price, c.quantity AS quantity
                FROM products p, cart c
                WHERE p.prod_id = c.prod_id AND cart_id = {$item_id}");
                
          while($cart_item = mysql_fetch_assoc($result)){                
            
		$name= $cart_item['name'];
		$price= $cart_item['price'];
		$stock= $cart_item['stock'];
		$details= $cart_item['details'];
                $quantity= $cart_item['quantity'];
                $id= $cart_item['prod_id'];
                
                $item_total= $quantity * $price;
                
                if(isset($cart_total)){
                    $cart_total= $cart_total + $item_total;
                }else{
                    $cart_total= $item_total;
                }
                
                
                        $SQL2 = "SELECT image_id FROM product_image WHERE prod_id = \"" . $id . "\"";
			$result2 = mysql_query($SQL2);
			while ($image_field = mysql_fetch_assoc($result2)){
				$image_loc= $image_field['image_id'];
			}
                                
                        
 
                echo "<div id=\"container\">";
                    echo "<div>";
                            echo "<img id=\"container-img\" src =\"{$image_loc}\" />";
                    echo "</div>";
                    echo "<div id=\"cart-detail\" >";
                            echo "<p>Item: {$name}</p>";
                    #        echo "<p>In Stock: {$stock}<br/>";
                            echo "<p>Details: {$details}</p><br/>";
                    echo "</div>";
                 #   echo "<div id=\"cart-detail\">";
                  #          echo "<p>Price: {$price}<br/>";
                 #           echo "<p>Quantity: {$quantity}<br/>";
                 #   echo "</div>";
                    echo "<div id=\"item-total\">";
                            echo "<p>Price: {$price}<br/>";
                            echo "<p>Quantity: {$quantity}<br/><br/>";
                            echo "<p>Item Total: {$item_total}<br/>";
                    echo "</div>";
                    
              #######     update quantity test zone!!!!! ############
                    
              #So far this updates the db but requires a page refresh for the new quantity to show.
              #Also, it updates EVERY product in the cart to the figure entered into ANY textbox.
              # This happens because on refresh it tests the if (isset($_POST['update']) statement
              # which is true for every product container in the cart.
                   
                    echo "<form name='upd' action='shopping_cart.php' method='post' >";
                    
                            echo "<input type='hidden' name='update' value='true'>";
                            echo "<input id='quant' type='text' name='quant' value='{$quantity}'>";
                            echo "<input type='submit' value='Update'>";
                            
                    echo "</form>";
                    
                    if (isset($_POST['update'])){
                        
                        $quantity = $_POST['quant'];
                        updateCartQuant($quantity, $id);
                   }
                    
                    echo "</div>";
                    
                    
                   
                    

          }  
          
          echo "<div id=\"container\">";
                echo "<div id=\"item-total\">";
                            
                            echo "<p>Cart Total: {$cart_total}<br/>";
                echo "</div>";
          echo "</div>";

 	?>
    
    
    
 		
 	
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
