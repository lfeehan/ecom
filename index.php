 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	
<?php
    $user_name = "root";
    $password = "p";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
?>
 
 </head>
 
 <body>
 
 <div id="container">
 	<div id="header"><?php Echo "Header image here "."<BR>" ;?>
 </div>
 	<div id="breadcrumb" >
 	<?php echo "breadcrumb" ?></div>

 	
 	
 	<div id="fullpackage">
 	
 	<?php echo "I KNOW THESE WONT REALLY GO HERE ITS JUST TO TEST PHP/SQL I/O. Lenny.<BR>"?>

	<?php

	$allProd = "SELECT * FROM PRODUCTS";
	$result = mysql_query($allProd);
	 if ($db_found) {
	
	
	while ($db_field = mysql_fetch_assoc($result)) { 
		echo "<div style=\"float: left; padding: 10px; width:200px;\">";
	$prod_id= $db_field['PROD_ID'];
	$prod_name= $db_field['PROD_NAME'];
		echo "<p>";
		echo "Product Name: " . $prod_name;
 		echo "</p>";
	$prod_price= $db_field['PROD_PRICE'];
		echo "<p>";
		echo "Price: " . $prod_price;
 		echo "</p>";	
	$prod_quantity= $db_field['PROD_QUANTITY'];
		echo "<p>";
		echo "In Stock: " . $prod_quantity;
 		echo "</p>";
 	$prod_desc= $db_field['PROD_DESC'];
		echo "<p>";
		echo "About: " . $prod_desc;
 		echo "</p>";
 		 		
 	$SQL2 = "SELECT IMAGE_ID
		FROM product_image
		WHERE PROD_ID = \"" . $prod_id . "\"";
		$result2 = mysql_query($SQL2);

		while ($image_field = mysql_fetch_assoc($result2)){
			$image_loc= $image_field['IMAGE_ID'];
			echo "<p>";
			echo "<img src =\"" . $image_loc . "\">";
			echo "</p>";
		}

 	
	echo "</div>";
	
	}
	$kites=mysql_query("SELECT * FROM PRODUCTS WHERE PROD_TYPE='kite'");
	$kites_result=mysql_fetch_array($kites);
 		$kites_name=$kites_result['PROD_NAME'];	
 	
 	$boards=mysql_query("SELECT*FROM PRODUCTS WHERE PROD_TYPE='board'");
 	$boards_result=mysql_fetch_array($boards);
 	$boards_name=$boards_result['PROD_NAME'];
	?>
 		</div>
 		<div id="newproducts"><?php echo "new products go here :"?></div>
 		<div id="kites"><?php  echo "kites go here :".$kites_name ?></div>
 		<div id="boards"><?php echo "boards go here :".$boards_name ?> </div>
 		<div id="accessories"><?php echo "accessories go here"?> </div>


	<?php
		mysql_close($db_handle);
		}
		else {
		echo "Database NOT Found ";
		mysql_close($db_handle);
		}
	?> 		
 		
 		
</div> <! container close div !>
</body>
<? mysql_close($db_handle); ?>
</html>
