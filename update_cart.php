<?php
session_start();

include 'database.php';
 if (isset($_POST['update'])){
	
    $id = $_POST['thisid'];
    $quantity = $_POST[$id."quant"];
    updateCartQuant($quantity, $id);
    
    #if quantity is zero item deleted from cart table
    if ($quantity == 0){
        $SQL = "DELETE FROM cart WHERE cart_id={$_SESSION['cart']} AND prod_id={$id}";
        queryDB($SQL);
    }
    #redirect back to shopping_cart page
    header( 'Location: shopping_cart.php' );
    exit;
}
 #if 'Empty Cart' button is pressed in shopping_cart, all tuples in the cart table
 #are deleted where cart_id = $_SESSION['cart'].
 #session is then destroyed and page redirects to home page.
 if (isset($_POST['delete'])){
     $SQL = "DELETE FROM cart WHERE cart_id={$_SESSION['cart']}";
     queryDB($SQL);
     session_destroy();
     unset($_SESSION);
     header( 'Location: index.php' );
     exit;
 }

 
?>