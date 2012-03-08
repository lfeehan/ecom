<?php include 'header.php';?>

<body>


 
 <div id="container">  	
 
  <?php include 'breadcrumb.php';?> 
   
 <div id="productText">
 
 	
 	
 	
 	<?php
 		#this takes the php?product=xxx value of xxx, this will reference the product we will display this page for
		#$url_id = $_GET['product'];
		if (isset ($_GET['product'])){
		$url_id = $_GET['product'];
		}
		else{
		$url_id = 50;
		}		
 	
		#database bit
		$user_name = "root";
		$password = "";
		$database = "ecom";
		$server = "127.0.0.1"; 
		$db_handle = mysql_connect($server, $user_name, $password);
		$db_found = mysql_select_db($database, $db_handle); 
		
		#sql query
		$allProd = "SELECT * FROM products WHERE PROD_ID =" . $url_id;
		$result = mysql_query($allProd);
		if ($db_found) {
			while ($db_field = mysql_fetch_assoc($result)) {
				$prod_id= $db_field['PROD_ID'];
				$prod_name= $db_field['PROD_NAME'];
				$prod_price= $db_field['PROD_PRICE'];
				$prod_quantity= $db_field['PROD_QUANTITY'];
				$prod_desc= $db_field['PROD_DESC'];
				
				
						
				$SQL2 = "SELECT IMAGE_ID FROM product_image WHERE PROD_ID = \"" . $prod_id . "\"";
				$result2 = mysql_query($SQL2);
				while ($image_field = mysql_fetch_assoc($result2)){
					$image_loc= $image_field['IMAGE_ID'];
					//echo "<p>";
					//echo "<img src =\"" . $image_loc . "\">";
					//echo "</p>";
				}
			}
		mysql_close($db_handle);
		}else{
			echo "Database NOT Found ";
			mysql_close($db_handle);
		}
	?> 
    <div id="leftdiv">
    				<?php echo "<p>";
					echo "<img src =\"" . $image_loc . "\">";
					echo "</p>";
					?>
    </div>
    <div id="middiv">
    </div>
    <div id="rigthdiv">
    	<div class="prodinfo">
        		<?php 
				echo "<p>";
				echo "Product Name: <b>" . $prod_name;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
       			<?php 
				echo "<p>";
				echo "Price: <b>" . $prod_price;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
      			<?php 
				echo "<p>";
				echo "In Stock: <b>" . $prod_quantity;
				echo "</b></p>";?>
        </div>
        <div class="prodinfo">
        		<?php 
				echo "<p>";
				echo "About: <b>" . $prod_desc;
				echo "</b></p>";?>
        </div>
    </div>
    <div id="description">
    Let's go sit... out on the decking. Description
    </div>

 </div>	<!-- productText close div -->
</div> <!-- container close div -->
<?php include 'footer.php';?>
</html>
