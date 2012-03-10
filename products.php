<! -- Variable prod_type is being passed through. this is included in the SQL 
query and a div of the product class is displayed for each result for product
of that type-->

<?php include 'header.php';?>
<?php include 'database.php';?>
<body>
 <div id="container">  	
  </div>
  
 <?php $prod_type=$_GET['prod_type'];
  include 'breadcrumb.php';?>
 	
	<?php
		 
		
		
		$all_rows=queryDB("SELECT * FROM products WHERE type='$prod_type'");
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
			echo "<a href = \"dynamic_product.php?product=" . $id . "\">" .  $name . "</a>";
            echo "<br />".$description;
           
            
            #get image path for this particular product id
     		$image_loc = getImage($id);
     		
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
