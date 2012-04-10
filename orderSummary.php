<?php
    session_start();
?>
<?php include 'database.php';?>
<?php 
    if(isset($_SESSION['cart'])){
        // do nothing
    }else{
        $_SESSION['cart'] = "";
    }
?>

<?php include 'header.php';?>

<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>

<div class="orderSummary">

<TABLE class="padded-table" border=0 cellpadding=0 align=LEFT>
<TR><TD align=left colspan=3><B>Order Summary</B></TD></TR>
<TR><TD><B><I>Item</TD><TD><B><I>Qty</TD><TD><B><I>Price</TD></TR>

 <?php
 
    $cart_id = $_SESSION['cart'];

    $result = queryDB("SELECT p.prod_id AS prod_id, name, details, p.quantity AS stock, price, c.quantity AS quantity
	FROM products p, cart c
	WHERE p.prod_id = c.prod_id AND cart_id = {$cart_id}");
    
     while($cart_item = mysql_fetch_assoc($result)){                
            
		$name= $cart_item['name'];
		$price= $cart_item['price'];
		$stock= $cart_item['stock'];
		$details= $cart_item['details'];
                $quantity= $cart_item['quantity'];
                $id= $cart_item['prod_id'];
                
                $item_total= $quantity * $price;
                
                if(isset($cart_total)){
                    $cart_total= $cart_total + $item_total;
                }else{
                    $cart_total= $item_total;
                }
		
		echo ( "<TR>" );                
                echo ( "<TD>{$name}</TD><TD>{$quantity}</TD><TD>{$price}</TD>" );
                echo ( "</TR>" );
     }
     echo ( "<TR><TD>Total</TD><TD></TD><TD><B>{$item_total}</B></TD></TR>" );
     ?>

</TABLE>
<BR>


</div>
<div class="orderSummary">
<TABLE class="padded-table" border=0 cellpadding=0 align=LEFT>
<TR><TD align=left colspan=2><B>Customer Details</B></TD></TR>


<?php
$cust = session_id();
$result = queryDB("SELECT fname, sname, address, email, payment_method
	FROM customer
	WHERE customer_id = '" . $cust . "'");

$cart_item = mysql_fetch_assoc($result);
	$fname= $cart_item['fname'];
	$sname= $cart_item['sname'];
	$address= $cart_item['address'];
	$email= $cart_item['email'];
	$payment = $cart_item['payment_method'];
	
	echo ( "<TR><TD>Name: </TD><TD>{$fname} {$sname}</TD></TR>");
	echo ( "<TR><TD>Address:</TD><TD>{$address}</TD></TR>");
	echo ( "<TR><TD>email:</TD><TD>{$email}</TD></TR>");
	echo ( "<TR><TD>Payment:</TD><TD>{$payment}</TD></TR>" );
	echo ( "</TABLE>" );
	
	

	echo "<form name='complete' action='checkout.php' method='post' >";
	
	
	echo "<input type='hidden' name='customer_id' value='{$cust}'>";
	echo "<input type='hidden' name='cart_id' value='{$cart_id}'>";
	echo "<input type='submit' id='finished' value='Complete Order'>";
	
	echo "</form>";
	
?>


</div>


</div>
</body>

<?php include 'footer.php';?>

