 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 
 <head> 
 <title>Kitesurfing Shop</title>
 <link href="ecom.css" rel="stylesheet" type="text/css" />
 	<link href='http://fonts.googleapis.com/css?family=Russo+One' rel='stylesheet' type='text/css'>
 </head>
<!--Header file contains the header of the site -->

<div id="container">
	<div id="header">
	  <div id="title">
	 <a href="index.php"> Panther Kitesurfing </a>
	  </div>
	<div id="cartHeader">
	
		SUPER SHOPPING CART<br/>
                <?php 
                    $item_total = cartTotal();
                    echo $item_total;
                
                    if($item_total != "<p>Cart is empty</p>"){
                        echo "<form action='shopping_cart.php' method='link' >";
                        echo "<input type='image' src='images/cartPanther.png'  width='170' height='58' name='gotocart' value=' Go to Cart' /></form>";
                    }
                ?>                
	</div>

 </div>
