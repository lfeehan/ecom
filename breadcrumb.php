<div id="breadcrumb" >
 	
  <?php echo '<a href="index.php">Home</a>';
    if (isset($beginner))
    {
      echo " > ";
      echo "Beginner";
    }
   
    if (isSet($prod_type)) 
    {
      echo " > ";
      echo "<a href=\"products.php?prod_type=".$prod_type."\">".$prod_type. "</a>";
    }

    if (isSet($name)) 
    {
      echo " > ";
      echo $name;
    }
  ?>
</div> 

