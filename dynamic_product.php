<?php
    session_start();
?>
<?php include 'database.php';?>
<?php include 'header.php';?>

<?php
 		#this takes the php?product=xxx value of xxx, this will reference the product we will display this page for
		#$url_id = $_GET['product'];
		if (isset ($_GET['product']))
		{
		  $url_id = $_GET['product'];
		}
		else
		{
		  $url_id = 1;
		}		
		
		#this makes a cookie to diplay on homepage as recently viewed
		if (isset ($_GET['product']))
		{
		  $view_id = $_GET['product'];
		  setcookie('view', $view_id, time() + (60*60*24*2));
		}
		else{}
 					
		#sql query
		
		$all_rows=queryDB("SELECT * FROM products WHERE prod_id='$url_id'");
		while($one_row=mysql_fetch_assoc($all_rows)) 
		{
		  $id= $one_row['prod_id'];
		  $name= $one_row['name'];
		  $name_long=$one_row['name_long'];
		  $price= $one_row['price'];
		  $quantity= $one_row['quantity'];
		  $details= $one_row['details'];
		  $description=$one_row['description'];
		  $prod_type=$one_row['type'];
				
				
						
		  $SQL2 = "SELECT image_id FROM product_image WHERE prod_id = \"" . $id . "\"";
		  $result2 = mysql_query($SQL2);
		  while ($image_field = mysql_fetch_assoc($result2))
		  {
			  $image_loc= $image_field['image_id'];
			  //echo "<p>";
			  //echo "<img src =\"" . $image_loc . "\">";
			  //echo "</p>";
		  }
		}
	
	?> 
<link href="ecom.css" rel="stylesheet" type="text/css" />

<body>
<div id="main-content"> 
<?php include 'breadcrumb.php';?>	
  
  <div id="productText"> 	
    <div id="leftdiv">
      <?php echo "<p>";
			echo "<img src =\"" . $image_loc . "\">";
			echo "</p>";
			?>
    </div>
    
    <div id="rigthdiv">
		  <div class="prodinfo">
		  	<?php 
		  	$prod_id = $_GET['product'];
          # echo $prod_id;
        ?>
        <form action="shopping_cart.php" method="post" >
            
    		<!-- hidden fields add and product are passed to cart.php as a POST rather than onclick -->
			  <input type="hidden" name="add" value="true">
			  <input type="hidden" name="product" value="<?php echo $prod_id ?>">
			  <input type="image" src="images/buyPanther.png" onMouseDown="this.src='images/buyPantherRoll.png'" onMouseUp="this.src='images/buyPanther.png'" width="170" height="58" value="Add to Cart">

			  </form>
          
			

		
    </div>
	
   	<div class="prodinfo">
      <div class="textformatting">
				<?php 
				echo "<b>Name: </b>" . $name;
				?>				
      </div>
    </div>
    
    <div class="prodinfo">
      <div class="textformatting">
				<?php 				
				echo "<b>Price: </b>&euro;" . $price;
				?>
      </div>
    </div>
    
    <div class="prodinfo">
			<div class="textformatting">
				<?php 
				echo "<b>In stock: </b>" . $quantity;
				?>
		  </div>
    </div>
    
    <div id="details">
  		<div class="textformatting">
        <?php 
                            if($details != ""){
				echo "<b>Details: </b>" . $details;
                            }
				?>
      </div>
    </div>
        
    <div id="details">
        <div class="textformatting" style="color:red; font-size:14px;">
            Spend more than &euro;1350 today and receive our fantastic 15% discount!
      </div>
    </div>
        
		
  </div>
  
  <div id="description">
  	<div class="textformatting">
    <?php echo $description; ?>
  	</div>
  </div>

 </div>	<!-- productText close div -->
</div> <!-- container close div -->
<?php include 'footer.php';?>
<? mysql_close($db_handle); ?>
</html>
