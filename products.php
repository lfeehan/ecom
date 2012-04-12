<! -- Variable prod_type is being passed through. this is included in the SQL 
query and a div of the product class is displayed for each result for product
of that type-->

<?php
    session_start();
?>
<?php include 'database.php';?>
<?php include 'header.php';?>

<body>
 <div id="main-content">  	

  
 <?php
 		$prod_type=$_GET['prod_type'];
 		$beginner=$_GET['beginner'];
 		include 'breadcrumb.php';
		
		
		if (isset ($beginner))
		{
		   $all_rows=queryDB("SELECT * FROM products WHERE beginner=1");
    }
		
		if (isset($prod_type))
		{
		  $all_rows=queryDB("SELECT * FROM products WHERE type='$prod_type'");
		}
		while($one_row=mysql_fetch_assoc($all_rows)) {
		$id= $one_row['prod_id'];
		$name= $one_row['name'];
		$name_long=$one_row['name_long'];
		$price= $one_row['price'];
		$quantity= $one_row['quantity'];
		$details= $one_row['details'];
		$description=$one_row['description'];
    	echo '<div class="product">';
		#this line generates a dynamic link based on product id, only one page "dynamic_product.php" handles all products
		
		#echos Name of product as a link	
		echo '<div class="productsPageProductName">';
		echo "<a href = \"dynamic_product.php?product=" . $id . "\">" .  $name . "</a>";
		echo '</div>';
      
        #Echos stock status
        echo '<div class="productsPageStockStatus">';
        if ($quantity ==0) {
        echo "Out of Stock";
        }
        else echo "In Stock";
        echo '</div>';
         
        #Echos product price
        echo '<div class="productsPageProductPrice">';
        echo '&euro;'.$price;
        echo '</div>';   
        
        #Echos product details 
        # Need to clean up product details in DB and decide about this
#        echo '<div class="productsPageProductDetails">';
#        echo $details;
#        echo '</div>'; 
                    
        #get image path for this particular product id
 		$image_loc = getImage($id);
 		$image_resized = resizeImage($image_loc, 250,250);
 		#output the image in a div class prodthumb
	    echo '<div class="prodthumb">';
	    echo "<img src =\"" . $image_resized . "\">";
	    echo "</div>";
	    echo "</div>";
        }
 
    ?> 
	
	
	
</div>
		
</body>

<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
