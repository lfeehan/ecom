 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	<?

    $user_name = "root";
    $password = "p";
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
print "Database NOT Found ";
mysql_close($db_handle);
}

?>
 
 
 </head>
 
 <body>
 
 <div id="container">
 	<div id="header"><?php Echo "Header image here "."<BR>" ;?>
 </div>
 	<div id="breadcrumb" >
 	<? echo "breadcrumb" ?></div>
 	
 		<div id="fullpackage">
 		<? echo "full package image link.<BR>"?> <? echo $prod_name; ?></div>
 		<div id="newproducts"><? echo "new products go here"?></div>
 		<div id="kites"><? echo "kites go here " ?></div>
 		<div id="boards"><?echo "boards go here" ?> </div>
 		<div id="accessories"><? echo "accessories go here"?> </div>
        
        <div id="footer"><? echo "terms and conds etc" ?> </div>
 	 


</div> <! container close div !>
</body>
<? mysql_close($db_handle); ?>
</html>