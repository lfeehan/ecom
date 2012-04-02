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
		return value;
	}
?>
<?php
	//checks to see if values are set and not null, returns to form page if error detected
	$errors = array();
	$required_fields = array('id', 'firstname', 'lastname', 'address', 'email', 'pay');
	
	foreach($required_fields as $fieldname)
	{
	if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
		{
			$errors[] = $fieldname;
			header("Location: form.php");
			exit;
		}
	}
	
	$fields_length = array('id', 'firstname', 'lastname', 'address', 'email', 'pay' => 30);
	foreach($fields_length as $fieldname => $maxlength)
	{
	if (strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlength)
		{
			$errors[] = $fieldname;
			header("Location: form.php");
			exit;
		}
	}
	



//inserts into db, should eventually redirect to overview page.
mysql_select_db($db_found);

$sql="INSERT INTO customer (customer_id, fname, sname, address, email, payment_method)
VALUES
('$_POST[id]','$_POST[firstname]','$_POST[lastname]','$_POST[address]','$_POST[email]','$_POST[pay]')";

if (!mysql_query($sql,$db_handle))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($db_handle);
?> 




