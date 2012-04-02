<?php
    session_start();
?>
<?php include 'database.php';?>
<?php include 'header.php';?>

 	<! 
SQL Tables 	
products
prod_id, name, name_long, price, quantity, details, description, type, date_added, supplier_id

product_image
prod_id, image_id

orders
order_id, customer_id, order_date, cart_id, completed

cart
cart_id, prod_id, quantity

customer
customer_id, fname, sname, address, email, payment_method
 	 ->


<link href="ecom.css" rel="stylesheet" type="text/css" />
<link href="ecom.css" rel="stylesheet" type="text/css" />
<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>	
  
 <div id="productText"> 	
	 <! User Details Form ->
	 <form name="customer" onsubmit="return validateForm()">
	 First Name: <input type="text" name="firstname" /><br />
	 Last Name: <input type="text" name="lastname" /><br />
	 Address: <input type="text" name="address" /> <br />
	 Email: <input type="text" name="email" /> <br />
	 
	 <input type="radio" name="payment_method" value="PayPal" /> Paypal <br />
	 <input type="radio" name="payment_method" value="Credit Card" /> Credit Card <br />	 
	 
	 <input type="submit" value="Submit" />
	 
	 </form>
	 
     <script type="text/javascript">
	
	 function validateForm() 
	 {
	    var fn=document.forms["customer"]["firstname"].value;
	    var sn=document.forms["customer"]["lastname"].value;
	    var addres=document.forms["customer"]["address"].value;
	    var email=document.forms["customer"]["email"].value;
    	var atpos=email.indexOf("@");
	    var dotpos=email.lastIndexOf(".");
	    if (fn==null || fn=="" || sn==null || sn==""|| addres==null || sn=="" || email==null || email="")
        {
            alert("Please Check Your Details");
            return false;
        }
	        
	    
    }     
	 
	 </script>
	  
   

 </div>	<!-- productText close div -->
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html
