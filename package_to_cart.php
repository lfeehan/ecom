<?php
session_start();

include 'database.php';

    if(isset($_POST['package'])){
        
        if(empty($_SESSION['cart']))
        {
            $query = "SELECT MAX( cart_id ) AS cart_id FROM cart";
            $result = queryDB($query);
            $last_cart_id = mysql_fetch_assoc($result);
            $_SESSION['cart'] = $last_cart_id['cart_id'] + 1;
        }

        $SQL1 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 3, 1)";
        queryDB($SQL1);

                $SQL1 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 203, 1)";
        queryDB($SQL1);

                $SQL1 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 303, 1)";
        queryDB($SQL1);

                $SQL1 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 403, 1)";
        queryDB($SQL1);
    }

    header( 'Location: shopping_cart.php' );
 
?>
