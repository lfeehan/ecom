 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	
<?php
    $user_name = "root";
    $password = "";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
$SQL = "SELECT * FROM PRODUCTS";
$result = mysql_query($SQL);
 if ($db_found) {



while ($db_field = mysql_fetch_assoc($result)) { 
$prod_id= $db_field['PROD_ID'];
$prod_name= $db_field['PROD_NAME'];
$prod_price= $db_field['PROD_PRICE'];
$prod_quantity= $db_field['PROD_QUANTITY'];
}

mysql_close($db_handle);

}
else {
echo "Database NOT Found ";
mysql_close($db_handle);
}

?>
 
 
 </head>
 
 <body>
 
 <div id="container">
 	<div id="header"><?php Echo "Header image here "."<BR>" ;?>
 </div>
 	<div id="breadcrumb" >
 	<?php echo "breadcrumb" ?></div>
 	
 		<div id="fullpackage">
 		<?php echo "full package image link.<BR>"?>
 		<p>
 		<?php echo "Product Name: " . $prod_name; ?>
 		</p>
 		<p>
 		<?php echo "Price:" . $prod_price; ?>
 		</p>
 		<p>
 		<?php echo "In Stock :" . $prod_quantity; ?>
 		</p>	
 		
 		
 		</div>
 		<div id="newproducts"><?php echo "new products go here"?></div>
 		<div id="kites"><?php echo "kites go here " ?></div>
 		<div id="boards"><?php echo "boards go here" ?> </div>
 		<div id="accessories"><?php echo "accessories go here"?> </div>
 	 


</div> <! container close div !>
</body>
<? mysql_close($db_handle); ?>
</html>