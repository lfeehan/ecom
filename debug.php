<?php session_start(); ?>
<?php include 'header.php';?>

<?php
    $user_name = "root";
    $password = "";
    $database = "ecom";
    $server = "127.0.0.1"; 

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle); 

if (!$db_handle){
	die('fuck, the database is on fire:No Connection' . mysql_error());
}

if (!$db_found){
	die('fuck, the database is on fire:Not Selectable' . mysql_error());
}

$query1 = mysql_query("SHOW TABLES");
if (!$query1){
	die('fuck, the database is on fire:Show Tables' . mysql_error());
}

#predefined sql function
$num_rows = mysql_num_rows($query1);
echo "<form action=\"showtable.php\" method=\"POST\">";
echo "<select name=\"table\" size =\"1\" Font size=\"+2\">";

for($i=0; $i<num_rows; $i++){
	$tablename = mysql_fetch_row($query1);
	echo "<option value=\"{$tablename[0]}\"> {$tablename[0]}</option>";	
	echo "</select>";
	echo "<input type=\"submit\" value=\"submit\">";
	echo "</form>";
}

?>

<?php include 'footer.php';?>
</html>
