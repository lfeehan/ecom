 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml

 <?php include 'database.php';?>
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	
 </head>
<!--Header file contains the header of the site -->

<div id="container">
	<div id="header"><img src="images/header.png">
	<div style="float: right; padding-top:30px; padding-right: 50px;">
		SUPER SHOPPING CART<br/>
                <?php 
                    $item_total = cartTotal();
                    echo $item_total;        
                ?>
	</div>

 </div>
