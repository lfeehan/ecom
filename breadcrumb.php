<div id="breadcrumb" >
 	
 <?php echo '<a href="index.php">Home</a>';
 #changed this to isSet() function rather than != null. if you use !=null and it isnt declared as can happen
 #then you get an error in the breadcrumb. isset works around this, and if it is set to something at all
 #that means we have set it so we know its vaules ahead of time. Lenny
    if (isSet($prod_type)) {
        echo " > ";
        echo "<a href=\"products.php?prod_type=".$prod_type."\">".$prod_type. "</a>";
        }
    #same here
    if (isSet($name)) {
        echo " > ";
        echo $name;
        }
      ?>
</div> 

