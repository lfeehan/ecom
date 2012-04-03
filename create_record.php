<?php include 'database.php';?>
<?php
function mysql_prep( $value )
	{	
	//not in use at the moment, meant to check if sql safe
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		
		if( $new_enough_php)
			{
				if( $magic_quotes_active )
				{
					$value = stripslashes( $value );
				}
				$value = mysql_real_escape_string( $value );
			}
		else
			{
				if(!$magic_quotes_active)
					{
						$value = addslashes( $value );
					}
			}
		return $value;
	}
	
	$fname= mysql_prep( $_POST['firstname'] );
	$sname= mysql_prep( $_POST['lastname'] );;
	$add= mysql_prep( $_POST['address'] );;
	$email= mysql_prep( $_POST['email'] );;
	$payment_method= mysql_prep( $_POST['pay'] );;
?>
	
<?php


//inserts into db, should eventually redirect to overview page.
mysql_select_db($db_found);

$sql="INSERT INTO customer (customer_id, fname, sname, address, email, payment_method)
VALUES
('$_POST[id]','$fname','$sname','$add','$email','$payment_method')";

if (!mysql_query($sql,$db_handle))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($db_handle);
?> 



