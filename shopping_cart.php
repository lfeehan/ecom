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
        if(isset($_SESSION['cart'])){
        # $_GET takes item_id passed to URL from "Add to Cart" button. 
            $item_id = $_SESSION['cart'];
            
            $cart_total = null;
 
    
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
                    $cart_total = $cart_total + $item_total;
                }else{
                    $cart_total = $item_total;
                }
                
                
                        $SQL2 = "SELECT image_id FROM product_image WHERE prod_id ='{$id}' ";
			$result2 = mysql_query($SQL2);
			while ($image_field = mysql_fetch_assoc($result2)){
				$image_loc= $image_field['image_id'];
			}
                                
                        
 
                echo "<div id='container'>";
                    echo "<div>";
                            echo "<img id='container-img' src ='{$image_loc}' />";
                    echo "</div>";
                    echo "<div id='cart-detail' >";
                            echo "<p>Item: {$name}</p>";
                            echo "<p>Details: {$details}</p><br/>";
                    echo "</div>";
                    echo "<div id='item-total'>";
                            echo "<p>Price: {$price}<br/>";                            
                    
                            echo "<form name='upd' action='update_cart.php' method='post' >";
                    
                                echo "<input type='hidden' name='update' value='true'>";
                                echo "<input type='hidden' name='thisid' value='{$id}'>";
                                echo "<p>Quantity: <input id='quant' type='text' name='" . $id."quant" . "' value='{$quantity}' ><br/><br/>";
                                echo "<input type='submit' value='Update'>";
                            
                            echo "</form>";
                            
                            echo "<p>Item Total: {$item_total}<br/>";
                            
                    echo "</div>";
                echo "</div>";
          }
          
          
        }  
          ?> 
  <!--        <div id="container">
          
          
            <div id="item-total"><?php  # echo "<p>Cart Total: {$cart_total}<br/>"; ?>
            <form name="buy" action="form.php" method="post" >
                <input type="submit" value="Buy">
            </form>
          </div>
         </div> -->
         <?php   
         
             if(isset($_SESSION['cart']) && ($cart_total == 0)){
                 session_destroy();
                 unset($_SESSION);
                 #setcookie ("PHPSESSID", "", time() - 3600);
    }
         
         if(isset($_SESSION['cart'])){
         echo "<div id='container'>         
          
            <div id='item-total'><p>Cart Total: {$cart_total}<br/>
                <form name='buy' action='form.php' method='post' >
                    <input id='buybutton' type='submit' value='Buy Now!'>
                </form>
                <br/>
                <form name='del' action='update_cart.php' method='post' >
                    <input type='hidden' name='delete' value='true'>
                    <input type='Submit' value='Empty Cart'>
                </form>
            </div>";

         echo "</div>";
         }else{
             echo "
             <div id='container'>
                <div id='cartisempty'>
                Your cart has no items in it. &nbsp;
                     <a href='index.php'> Click here to keep shopping</a>
                </div>
             </div>";
         }
    ?>
  
    
    <?php

    ?>
    
    
 		
 	
 		
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
