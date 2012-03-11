<?php
	
	$server = "127.0.0.1";
	$user_name = "root";
	$password = "";
	$database = "ecom";
	
	$db_handle = mysql_connect($server, $user_name, $password);
	$db_found = mysql_select_db($database, $db_handle);
	
	if(!$db_found){
		die('</br><b>Could not connect: ' . mysql_error() . "</i></br>");
	}
	if (!mysql_select_db($database)){
		die('</br><b>Cant select database: ' . mysql_error() . "</i></br>");	
	}
	
	
	
	#------------CUSTOM FUNCTIONS----------
	#--can add data validation here later--
	
	#perform any query on DB: queryDB("select blah from blah blah")
	function queryDB($query){
		$result = mysql_query($query);
		if(!$result){
			#give semi-useful html formatted error output
			die("</br><b>query failed:</b><i> " . mysql_error() . "</i></br>");	
		}
		return $result;
	}

	#this gets the relevant image for the passed product_id
	#only returns one/first image at the moment.
	function getImage($product_id){
		$query = "SELECT IMAGE_ID FROM product_image WHERE PROD_ID = \"" . $product_id . "\"";
		$result = mysql_query($query);
		$image_field = mysql_fetch_assoc($result);
		$image_loc= $image_field['IMAGE_ID'];		
		return $image_loc;
	}
	
	function resizeImage($image_source, $w, $h){
		
		
		list($width, $height, $type, ) = getimagesize($image_source);
		
		
		$ratio = $width / $height;
		
		if ($w / $h > $ratio){
			$new_width = $h * $ratio;
			$new_height = $h;
		}else{
			$new_height = $w / $ratio;
			$new_width = $w;
		}

		
		$dstFile = 'images/thumbnails/tn_' . basename($image_source);
		
		
		switch($type){
		case 2:
			$dstHandle = imagecreatetruecolor($new_width, $new_height);
			$srcHandle = imagecreatefromjpeg($image_source);
			imagecopyresampled($dstHandle, $srcHandle, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagejpeg($dstHandle, $dstFile, 80);
			break;
		case 3:
			$dstHandle = imagecreatetruecolor($new_width, $new_height);
			$srcHandle = imagecreatefrompng($image_source);
			imagecopyresampled($dstHandle, $srcHandle, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
			imagepng($dstHandle, $dstFile, 9);
			break;
		}
			
		return($dstFile);
	}
	
	#query to insert into cart table
	#if cart_id exists insert prod_id OR if prod_id also exist increment its quantity
	#OR else insert new entry.
	function insertCart($cart_id, $prod_id, $quantity){
		$query = queryDB("select * from cart where cart_id = " . $cart_id);
		$fetch = mysql_fetch_assoc($query);
		$existing_cart = $fetch['cart_id'];
		
		$found = false;
		
		if(isSet($cart_id)){
			while($fetch = mysql_fetch_assoc($query)){
				$existing_prod = $fetch['prod_id'];
				if ($prod_id == $existing_prod){
					queryDB("UPDATE cart SET quantity = quantity+1 WHERE (cart_id = " . $cart_id . " AND prod_id = " . $prod_id . ");");
					$found = true;
				}
			}
			if(!$found){
				#cart exists but product entry does not
				queryDB("INSERT INTO cart VALUES (" . $cart_id . "," . $prod_id . "," . $quantity . ")");
			}
		}else{
			#if no cart_id existing
			queryDB("INSERT into cart (cart_id, prod_id, quantity) VALUES ($cart_id, $prod_id, $quantity)");	
		}
	}
	
	
	
	
?>
