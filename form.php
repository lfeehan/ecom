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
        var addr=document.getElementById("address").value;
        var email=document.getElementById("email").value;
          
           //Check each input
               if(isAlphabet(fn, "Letters Only in Name"))
               {
                    if(isAlphabet(sn, "Letters Only in Name"))
                    {
                        if(isAlphanumeric(addr, "Letters and Numbers Only in Addresss"))
                        {
                            if(emailValidator(email, "Please Check Your Email"))
                            {
                                return true;
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
        var alphaExp=/^[0-9a-zA-Z]+$/;
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

<script type="text/javascript" >
    function val()
    {
        var fn=document.getElementById("firstname").value;
        var sn=document.getElementById("lastname").value;
        var addr=document.getElementById("address").value;
        var email=document.getElementById("email").value;
        alert(fn+sn+addr+email);
    }

</script>


<?php include 'header.php';?>

<link href="ecom.css" rel="stylesheet" type="text/css" />
<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>

	<div class="textformatting">
    <form  name="customer" action="create_record.php"  method="post" >
		<div id="formContainer">
        
        <div class="formBox">
        Please enter your details so we can process your order. Thank you.(Basic form,little to no validation at the moment. Sends to create_record.php)
        </div>
        
        <div class="formBox">          
            UserID:  <input type="number" name="id" id="id" /> 
     
  		 </div>
         <div class="formBox"> 
         Firstname: <input type="text" name="firstname" id="firstname" />
        
         </div>
         <div class="formBox"> 
         Lastname: <input type="text" name="lastname" id="lastname" />
         </div>
        <div class="formBox"> 
         Address: <input type="text" name="address" id="address" />
         </div>
         <div class="formBox"> 
          Email: <input type="text" name="email" id="email" />
         </div>
        <div class="formBox"> 
         Payment Method: <input type="text" name="pay" id="pay" />
          <input type="submit" />
           </form>
		   
         </div>
        
    </div>
    </div>

</div>
</body>
