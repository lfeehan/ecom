 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	
 </head>
<!--Header file contains the header of the site -->

<div id="container">
	<div id="header">
	<div style="float: right; padding-top:30px;margin:10px; padding-right: 50px;background:white; border:thin solid;">
		SUPER SHOPPING CART<br/>
                <?php 
                    $item_total = cartTotal();
                    echo $item_total;        
                ?>
                <?php
                    if($item_total != "<p>Cart is empty</p>"){
                        echo "<form action=\"shopping_cart.php\" method=\"link\" >";
                        echo "<input type=\"submit\" name=\"gotocart\" value=\"Go to Cart\" /></form>";
                    }
                ?>                
	</div>

 </div>
