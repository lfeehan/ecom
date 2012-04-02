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

<link href="ecom.css" rel="stylesheet" type="text/css" />
<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>

	<div class="textformatting">
    <form action="create_record.php" method="post">
		<div id="formContainer">
        
        <div class="formBox">
        Please enter your details so we can process your order. Thank you.(Basic form,little to no validation at the moment. Sends to create_record.php)
        </div>
        
        <div class="formBox">          
            UserID:  <input type="number" name="id" /> 
     
  		 </div>
         <div class="formBox"> 
         Firstname: <input type="text" name="firstname" />
        
         </div>
         <div class="formBox"> 
         Lastname: <input type="text" name="lastname" />
         </div>
        <div class="formBox"> 
         Address: <input type="text" name="address" />
         </div>
         <div class="formBox"> 
          Email: <input type="text" name="email" />
         </div>
        <div class="formBox"> 
         Payment Method: <input type="text" name="pay" />
          <input type="submit" />
           </form>
		   
         </div>
        
    </div>
    </div>

</div>
</body>
