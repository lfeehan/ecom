<div style="width:100%" >
 	
<?php
  #base case, always shown
  echo "<div class='breadcrumb'>";
    echo '<a href="index.php">Home</a>';
  echo "</div>";
   
    if (isset($_GET['beginner']))
    {
    	echo "<div class='breadcrumb'>";
        echo "Beginners";
      echo "</div>";
    }
     
    if (isSet( $_GET['prod_type']   )) 
    {

      echo "<div class='breadcrumb'>";
        echo $_GET['prod_type'];
      echo "</div>";
    }
    
    if (isSet($_POST['firstname']))
    {
    	echo "<div class='breadcrumb'>";
       echo "Checkout";
      echo "</div>";
    }
    
if (isSet($_GET['product'])) 
    { 
	    $prod = $_GET['product']; 
	    $prodLink = "undefined"; 
	    $prodName = "undefined";
    	    
	    if ($prod <= 100)
	    {
	      $prodName = "Boards";
	      $prodLink = "http://localhost/ecom/products.php?prod_type=Boards";	    
	    }
	    else if ($prod >100 && $prod <= 200)
	    {
  	    $prodName = "SurfBoards";
  	    $prodLink = "http://localhost/ecom/products.php?prod_type=Surfboards";	
	    }
	    else if ($prod >200 && $prod <= 300)
	    {
  	    $prodName = "Kites";
  	    $prodLink = "http://localhost/ecom/products.php?prod_type=Kites";	
	    }
	    else if ($prod >300 && $prod <= 400)
	    {
  	    $prodName = "Harnesses";
  	    $prodLink = "http://localhost/ecom/products.php?prod_type=Harnesses";	
	    }
	    else if ($prod >400 && $prod <= 500)
	    {
  	    $prodName = "Accessories";
  	    $prodLink = "http://localhost/ecom/products.php?prod_type=Accessories";	
	    }    	    

      echo "<div class='breadcrumb'>";
       echo "<a href = '{$prodLink}'> {$prodName}</a>";
      echo "</div>";
    }

    if (isSet($name)) 
    {
       echo "<div class='breadcrumb'>";
      echo $name;
      echo "</div>";
    }
    
  ?>
</div>


