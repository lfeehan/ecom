<?php
    session_start();
?>
<?php include 'database.php';?>
<?php 
  if(isset($_SESSION['cart']))
  {
    // do nothing
  }
  else
  {
    $_SESSION['cart'] = "";
  }
?>
<?php include 'header.php';?>

<body>
<div id="main-content" style="height:600px;"> 
<?php include 'breadcrumb.php';?>


<?php
  function mysql_prep( $value )
	{	
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");
		
		if($new_enough_php)
		{
			if( $magic_quotes_active )
			{
				$value = stripslashes( $value );
			}
			$value = mysql_real_escape_string( $value );
		}
		else
		{
			if(!$magic_quotes_active)
				{
					$value = addslashes( $value );
				}
		}
		return $value;
	}
	
?>




<div id="productText">
<div class="orderSummary">

<TABLE class="padded-table" border=0 cellpadding=0 align=LEFT>
  <TR>
    <TD align=left colspan=3><B>Order Summary</B>
    </TD>
  </TR>
  <TR>
    <TD><B><I>Item</TD>
    <TD><B><I>Qty</TD>
    <TD><B><I>Price</TD>
  </TR>

<?php
 
  $cart_id = $_SESSION['cart'];
    
  $change_quant = false;

  $result = queryDB("SELECT p.prod_id AS prod_id, name, details, p.quantity AS stock, price, c.quantity AS quantity
	FROM products p, cart c
	WHERE p.prod_id = c.prod_id AND cart_id = {$cart_id}");
    
   while($cart_item = mysql_fetch_assoc($result))
   {       
    $name= $cart_item['name'];
		$price= $cart_item['price'];
		$stock= $cart_item['stock'];
		$details= $cart_item['details'];
    $quantity= $cart_item['quantity'];
    $id= $cart_item['prod_id'];
    $item_total= $quantity * $price;
              
    if(isset($cart_total))
    {
      $cart_total= $cart_total + $item_total;
    }
    else
    {
      $cart_total= $item_total;
    }
		
		echo ( "<TR>" );                
      echo ( "<TD>{$name}</TD><TD>" );
    	if( $quantity > $stock )
    	{	#stock check                   
        if(isset($loop_count))
        {                                    
          $loop_count = $loop_count + 1;
        }
        else
        {
          $loop_count = 0;
        }

        $outofstock[$loop_count] = $name;

        $change_quant = true;
        $max_stock[$loop_count] = $stock;
        echo("<font color=red>{$quantity}<i> Check Stock </i></font>");
      }
      else
      {
        echo($quantity);
      }
      echo ( "</TD><TD>&euro;{$item_total}</TD></TR>" );
   }
        
   if($cart_total >= 1350){
   	   echo ( "<TR><TD><font color='red'>Discount percentage</font></TD><TD></TD><TD><font color='red'>15%</font></TD></TR>" );
        echo ( "<TR><TD>Total before discount</TD><TD></TD><TD>&euro;{$cart_total}</TD></TR>" );
       $cart_total = $cart_total * 0.85;
       echo ( "<TR><TD><B>Total with discount!!!</B></TD><TD></TD><TD><B>&euro;{$cart_total}</B></TD></TR>" );
   }else{
       echo ( "<TR><TD>Total</TD><TD></TD><TD><B>{$cart_total}</B></TD></TR>" );
   }
   
?>

</TABLE>
<BR>


</div>
<div class="orderSummary">
  <TABLE class="padded-table" border=0 cellpadding=0 align=LEFT>
  <TR><TD align=left colspan=2><B>Customer Details</B></TD></TR>
  <?php

	  $fname = mysql_prep( $_POST['firstname'] );
	  $sname = mysql_prep( $_POST['lastname'] );;
	  $address = mysql_prep( $_POST['address1'] . " " . $_POST['address2'] . " " . $_POST['city'] . " " . $_POST['country'] );;
	  $email = mysql_prep( $_POST['email'] );;
	  $payment = mysql_prep( $_POST['pay'] );;
	
	  echo ( "<TR><TD>Name: </TD><TD>{$fname} {$sname}</TD></TR>");
	  echo ( "<TR><TD>Address:</TD><TD>{$address}</TD></TR>");
	  echo ( "<TR><TD>email:</TD><TD>{$email}</TD></TR>");
	  echo ( "<TR><TD>Payment:</TD><TD>{$payment}</TD></TR>" );
	  echo ( "</TABLE>" );
          
    if($change_quant == false)
    {
    	echo "</div>";
      echo "<form name='complete' action='checkout.php' method='post' >";

      echo "<input type='hidden' name='fname' value='{$fname}'>";
      echo "<input type='hidden' name='sname' value='{$sname}'>";
      echo "<input type='hidden' name='address' value='{$address}'>";
      echo "<input type='hidden' name='email' value='{$email}'>";
      echo "<input type='hidden' name='payment' value='{$payment}'>";
      
      echo "<input type='hidden' name='cart_id' value='{$cart_id}'>";
      echo "<input type='submit' id='finished' value='Complete Order' style='float:right;'>";

      echo "</form>";
    }
    else
    {
      echo "<div id='change-quant'>";          
      echo "<form name='complete' action='shopping_cart.php' method='post' >";

      for($i = 0; $i < count($outofstock); ++$i)
      {
        echo "<p>The maximum number of <b>{$outofstock[$i]}</b> units you can order at the moment is <b>{$max_stock[$i]}</b>. </p>";
      }
      echo "<p>Please go back to your cart and change the quantity";
      if((count($outofstock)) > 1){echo "'s";}
      echo".</p>";

      echo "<input type='submit' id='finished' value='Change Quantity'>";

      echo "</form>";
      echo "</div>";
    }
	
?>



</div>
</body>

<?php include 'footer.php';?>

