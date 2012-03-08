<div id="breadcrumb" >
 	
 <?php echo '<a href="index.php">Home</a>';
    if ($prod_type != null) {
        echo " > ";
        echo "<a href=\"products.php?prod_type=".$prod_type."\">".$prod_type. "</a>";
        }
    
    if ($prod_name != null) {
        echo " > ";
        echo $prod_name;
        }
      ?>
</div> 

