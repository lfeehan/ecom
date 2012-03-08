<! -- Variable prod_type is being passed through. this is included in the SQL 
query and a div of the product class is displayed for each result for product
of that type-->

<?php include 'header.php';?>
<?php include 'database.php';?>
<body>
 <div id="container">  	
  </div>
 <?php include 'breadcrumb.php';?>
 	
	<?php
		 
		$prod_type=$_GET['prod_type'];
		
		$all_rows=queryDB("SELECT * FROM products WHERE PROD_TYPE='$prod_type'");
		while($one_row=mysql_fetch_assoc($all_rows)) {
		    $prod_id= $one_row['PROD_ID'];
		    $prod_name=$one_row['PROD_NAME'];
		    $prod_desc=$one_row['PROD_DESC'];
    		echo '<div class="product">';
			#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
			echo "<a href = \"dynamic_product.php?product=" . $prod_id . "\">" .  $prod_name . "</a>";
            echo "<br />".$prod_desc;
           
            
            #get image path for this particular product id
     		$image_loc = getImage($prod_id);
     		
     		#output the image in a div class prodthumb
		    echo '<div class="prodthumb">';
		    echo "<img src =\"" . $image_loc . "\">";
		    echo "</div>";
		    echo "</div>";
            }
 
    ?> 
	
	</div>
	
</div>
		
</body>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
