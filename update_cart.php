<?php
session_start();

include 'database.php';
 if (isset($_POST['update'])){
	echo $_POST['thisid'];
	
		$id = $_POST['thisid'];
		$quantity = $_POST[$id."quant"];
		updateCartQuant($quantity, $id);

	}

header( 'Location: shopping_cart.php' );
?>