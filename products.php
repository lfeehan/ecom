<?php include 'header.php';?>
<?php
    $user_name = "root";
    $password = "p";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
?> 

	<?php
		$prod_type=$_GET['prod_type'];
		echo $prod_type;
		

			
		$Prod = "SELECT *
		FROM products
		WHERE PROD_TYPE = \"" . $prod_type . "\"";
		$result = mysql_query($Prod);	
		if ($db_found) {
			while ($db_field = mysql_fetch_assoc($result)) {
				$prod_name= $db_field['PROD_NAME'];
				echo "<p>";
				echo "Product Name: <b>" . $prod_name;
 				echo "</b></p>";
				
				
			} 
		}
		?> 

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
