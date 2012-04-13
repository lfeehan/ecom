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

<!-- Validation Script -->
<script type="text/javascript" >
    function validateForm()
    {
        var fn=document.getElementById("firstname").value;
        var sn=document.getElementById("lastname").value;
        var addr1=document.getElementById("address1").value;
        var addr2=document.getElementById("address2").value;
        var city=document.getElementById("city").value;
        var country=document.getElementById("country").value;
        var email=document.getElementById("email").value;
          
           //Check each input
        if(isAlphabet(fn, "Letters Only in Name"))
        {
          if(isAlphabet(sn, "Letters Only in Name"))
          {
            if(isAlphanumeric(addr1, "Letters and Numbers Only in Addresss"))
            {
              if(isAlphanumeric(addr2, "Letters and Numbers Only in Addresss"))
              {
                if(isAlphanumeric(city, "Letters and Numbers Only in Addresss"))
                {    
                  if(isAlphanumeric(country, "Letters and Numbers Only in Addresss"))  
                  {
                    if(emailValidator(email, "Please Check Your Email"))
                    {
                      return true;
                    }
                   } 
                 }   
              }   
            }
          }
        }
            
            return false;
    }
    
    function notEmpty(elem, helperMsg)
    {
        if(elem.length==0)
        {
            alert(helperMsg);
            elem.focus();
            return false;
        }
        return true;
    }
    
    function isAlphabet(elem, helperMsg)
    {
        var alphaExp=/^[a-zA-Z]+$/;
        if(elem.match(alphaExp))
        {
            return true;
        }
        else
        {
            alert(helperMsg);
            elem.focus;
            return false;
        }
    }
    
    function isAlphanumeric(elem, helperMsg)
    {

        var alphaExp=/^[0-9a-zA-Z ]+$/;

        if(elem.match(alphaExp))
        {
            return true;
        }
        else
        {
            alert(helperMsg);
            elem.focus;
            return false;
        }
    }
    
    function emailValidator(elem, helperMsg)
    {
        var emailExp=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
        if(elem.match(emailExp))
        {
            return true;
        }
        else
        {
            alert(helperMsg+elem);
            elem.focus;
            return false;
        }
    }

</script>


<?php include 'header.php';?>

<link href="ecom.css" rel="stylesheet" type="text/css" />
<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>

<div class="orderSummary">
		
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
</body>
