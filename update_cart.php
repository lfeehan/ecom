<?php
session_start();

include 'database.php';
 if (isset($_POST['update'])){
	echo $_POST['thisid'];
	
		$id = $_POST['thisid'];
		$quantity = $_POST[$id."quant"];
		updateCartQuant($quantity, $id);
                
                echo $quantity;
                
                if ($quantity == 0){
                $SQL3 = "DELETE FROM cart WHERE cart_id={$_SESSION['cart']} AND prod_id={$id}";
                queryDB($SQL3);
          }

	}

# header( 'Location: shopping_cart.php' );
?>