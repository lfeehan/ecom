

<?php include 'header.php';?>
<?php
    $user_name = "root";
    $password = "p";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
?> 
<body>
 <?php
		$prod_type=$_GET['prod_type'];
		echo $prod_type;
		$product=mysql_query("SELECT * from products where PROD_TYPE='kites'");
		
		
		$boards_result=mysql_fetch_array($product);
 	    $prod_name=$boards_result['PROD_NAME'];
		
		echo $prod_name;
		?> 
 <div id="container">  	
  </div>
 <?php include 'breadcrumb.php';?>
 	<div class="product">
	<?php
		
		echo $prod_name;
		?> 
	<?php echo 'display image as link to product go to dynamic product page on click'; ?>
	</div>
	 	<div class="product">
	<?php
		
		echo $prod_type;
		?> 
	</div>
	 	<div class="product">
	<?php
		
		echo $prod_type;
		?> 
	</div>
</div>
		
</body>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
