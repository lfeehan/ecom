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

<div id="productText" style="width:60%;">
  <div class="orderSummary" >
		
    <table class="padded-table">
		  <form name="customer" action="orderSummary.php"  method="post" onsubmit="return validateForm()" >
			
		  <input type="hidden" name="id" id="id" value=<?php echo(session_id());?> /> 

		  <tr>
		  <td>Firstname: </td><td><input type="text" name="firstname" id="firstname" /></td>
		  </tr>

		  <tr>
		  <td>Lastname: </td><td><input type="text" name="lastname" id="lastname" /></td>
		  </tr>
		
		  <tr>
		  <td>Address: </td><td><input type="text" name="address1" id="address1" /></td>
		  </tr>
					  <tr>
		  <td>Address: </td><td><input type="text" name="address2" id="address2" /></td>
		  </tr>
					  <tr>
		  <td>City: </td><td><input type="text" name="city" id="city" /></td>
		  </tr>
					  <tr>
		  <td>Country: </td><td><input type="text" name="country" id="country" /></td>
		  </tr>
		
		  <tr>
		  <td>Email: </td><td><input type="text" name="email" id="email" /></td>
		  </tr>
		
		  <tr>
		  <td>Payment Method: </td><td><input type="radio" name="pay" value="Credit Card" />Credit Card
		                                <input type="radio" name="pay" value="Paypal" />Paypal
		  </td>
		  </tr>
		
		  <tr>
		  <td colspan=2 align = right>
		  <input type="submit" value="Submit" />
		  </td>
		
		  </form>
	  </table>
  </div>
</div>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
