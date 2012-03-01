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
<!--Header file contains the header of the site -->

<div id="container">
	<div id="header"><?php Echo "Header image here "."<BR>" ;?>
 </div>
 	<div id="breadcrumb" >
 	<?php echo "breadcrumb" ?></div>
 </div>
