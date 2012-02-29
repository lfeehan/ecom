 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />

 
 
 </head>
 
 <body>
 
 <div id="container">
 	<div id="header"><?php Echo "Header image here "."<BR>" ;?>
 	<?

    $user_name = "root";
    $password = "p";
    $database = "ecom";
    $server = "127.0.0.1";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);

if ($db_found) {

$SQL = "SELECT * FROM PRODUCTS";
$result = mysql_query($SQL);

while ($db_field = mysql_fetch_assoc($result)) {
print $db_field['PROD_ID'] . "<BR>";
print $db_field['PROD_NAME'] . "<BR>";
print $db_field['PROD_PRICE'] . "<BR>";
print $db_field['PROD_QUANTITY'] . "<BR>";
}

mysql_close($db_handle);

}
else {
print "Database NOT Found ";
mysql_close($db_handle);
}

?> </div>
 	<div id="breadcrumb" >
 	<? echo "breadcrumb" ?></div>
 	
 		<div id="fullpackage">
 		<? echo "full package image link" ?></div>
 		<div id="newproducts"><? echo "new products go here"?></div>
 		<div id="kites"><? echo "kites go here " ?></div>
 		<div id="boards"><?echo "boards go here" ?> </div>
 		<div id="accessories"><? echo "accessories go here"?> </div>
 	 


</div> <! container close div !>
</body>
</html>