

<?php include 'header.php';?>
<?php
    $user_name = "root";
    $password = "";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 
?> 
<body>
 <div id="container">  	
  </div>
 <?php include 'breadcrumb.php';?>
 	
	<?php
		 
		$prod_type=$_GET['prod_type'];
		$result=mysql_query("SELECT * FROM products WHERE PROD_TYPE='$prod_type'",$db_handle);
		
		while($row=mysql_fetch_array($result)) {
    		echo '<div class="product">';
            echo $row['PROD_NAME']."<br />".$row['PROD_DESC'];
            echo "</div>";
            }
    ?> 
	
	</div>
	
</div>
		
</body>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
