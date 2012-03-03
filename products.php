

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
		
		?> 
 <div id="container">  	
  </div>
 	<div id="breadcrumb" >
 	<a href="index.php" >Home </a> > <?php echo $prod_type ?> 
 	</div>
 	<div id="fullpackage">
	<?php
		
		echo $prod_type;
		?> 
	</div>
</div>
		
</body>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
