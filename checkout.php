<?php
session_start();

include 'database.php';
	
 #if (isset($_POST['finished'])){
	
		$customer_id = session_id();		
 		$cart_id = $_POST['cart_id'];
 		$fname = $_POST['fname'];
 		$sname = $_POST['sname'];
 		$address = $_POST['address'];
 		$email = $_POST['email'];
 		$payment = $_POST['payment'];
				
		$insert_customer = "INSERT INTO customer (customer_id, fname, sname, address, email, payment_method)
		VALUES('$customer_id','$fname','$sname','$address','$email','$payment')"; 		
		$result = queryDB($insert_customer);
		
		$removeQuery = queryDB("SELECT prod_id, quantity FROM cart WHERE cart_id = '{$cart_id}'");
		while ($remove = mysql_fetch_assoc($removeQuery)) 
		{ 
			$rm_prod_id = $remove['prod_id'];
 			$rm_qty = $remove['quantity'];
 			
			$get_stock = queryDB("SELECT quantity FROM products WHERE prod_id = '{$rm_prod_id}'");
			$stock = mysql_fetch_assoc($get_stock);
			$cur_stock = $stock['quantity'];
			
			$new_stock = $cur_stock - $rm_qty;
			
			$execute_remove_query = queryDB("UPDATE products SET quantity = '{$new_stock}' WHERE prod_id = '{$rm_prod_id}'");	
 		}
 				

		
                $query = "SELECT MAX( order_id ) AS order_id FROM orders";
                $result = queryDB($query);
                $last_order_id = mysql_fetch_assoc($result);
                $order_id = $last_order_id['order_id'];
                $order_id = $order_id + 1;
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