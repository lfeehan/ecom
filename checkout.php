<?php
session_start();

include 'database.php';
	
 #if (isset($_POST['finished'])){
		
		$customer_id = $_POST['customer_id'];
		$cart_id = $_POST['cart_id'];
		
                $query = "SELECT MAX( order_id ) AS order_id FROM orders";
                $result = queryDB($query);
                $last_order_id = mysql_fetch_assoc($result);
                $order_id = $last_order_id['order_id'];
                $order_id = $order_id + 1;
                #echo($order_id."<BR>");
                #echo($customer_id."<BR>");
                #echo($cart_id."<BR>");
                $completed = 0;
                $add_query = "INSERT INTO orders(order_id, customer_id, cart_id, completed )
                VALUES({$order_id}, '{$customer_id}', {$cart_id}, $completed);";
                $result = queryDB($add_query);
                #echo($result);
  #          }

	

session_regenerate_id(true);
session_destroy();
unset($_SESSION);

header( 'Location: index.php' );
?>