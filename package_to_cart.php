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
        

                $SQL2 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 203, 1)";
        

                $SQL3 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 303, 1)";
        

                $SQL4 = "INSERT INTO cart(cart_id, prod_id, quantity )
            VALUES({$_SESSION['cart']}, 403, 1)";

            $flag1 = false;
            $flag2 = false;
            $flag3 = false;
            $flag4 = false;
            
        $check = queryDB("SELECT * FROM cart WHERE cart_id = '{$_SESSION['cart']}'");

        while($result = mysql_fetch_assoc($check)){
        	if($result['prod_id'] == 3){
        		$flag1=true;
        	}
        	if($result['prod_id'] == 203){
        		$flag2=true;
        	}
        	if($result['prod_id'] == 303){
        		$flag3=true;
        	}
        	if($result['prod_id'] == 403){
        		$flag4=true;
        	}
        }
        if(!$flag1){
        	queryDB($SQL1);
        }
        if(!$flag2){
        	queryDB($SQL2);
        }
        if(!$flag3){
        	queryDB($SQL3);
        }
        if(!$flag4){
        	queryDB($SQL4);
        }
        
            
    }

    header( 'Location: shopping_cart.php' );
 
?>
