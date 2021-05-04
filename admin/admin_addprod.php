<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
	p.p { 
		border: 1px solid black;
		padding: 15px;
	}
	</style>
	 <?php #  - add_product.php
       // This page allows the administrator to add a product.
       include ('header.php'); 
       if (isset($_POST['submit'])) { // Handle the form.
       
       require_once ('mysql_connect.php'); // Connect to the database.
       	
       	// Validate the product name, image, supplier, price, and description.
       
       	// Check for a product name.
       	if (!empty($_POST['name'])) {
       		$name = addslashes($_POST['name']);
       	} else {
       		$name = FALSE;
       		echo '';
		   }
		   
		if (!empty($_POST['type'])) {
			$type = ($_POST['type']);
		} else { 
		
		}
       	
       	// Check for an image (not required).
       	if (is_uploaded_file ($_FILES['img']['tmp_name'])) {
       	if (move_uploaded_file($_FILES['img']['tmp_name'], "../img/{$_FILES['img']['name']}")) { // Move the file over.
       
		   echo '<div class="w3-padding w3-display-middle">
		   <p class="p">New product has been added!</p><br/>
		   <p><a href="admin_product.php"> Back to products</a></p></div>';
		
       
       	} else { // Couldn't move the file over.
  		     
       	echo '<p><font color="red">The file could not be moved.</font></p>';
       	$image = '';
       	       }
       	$image = $_FILES['img']['name'];
       	} else {
       		$image = '';
       	       }
       	
       	// Check for a size (not required).
       	/*if (!empty($_POST['size'])) {
       		$s = escape_data($_POST['size']);
       	} else {
       		$s = '<i>Size information not available.</i>';
       	}*/
       	
       	// Check for a price.
       	if (is_numeric($_POST['price'])) {
       		$price = $_POST['price'];
       	} else {
       		$price = FALSE;
       		echo '';
       	}
      	     	     	
       	   
       		// Add the print to the database.       
       		$query = "INSERT INTO product (name, img, price, type) VALUES ('$name','$image','$price', '$type')";
       	        $result = mysqli_query($dbc, $query); 
       	}
       	else { // Display the form.
       ?>
	<div class="w3-main" style="margin-left:340px;margin-right:40px; padding-top: 80px;">
         <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <input type="hidden" name="MAX_FILE_SIZE" value="524288">
 
    <h1 align="left" class="w3-large w3-text-grey"><b>Add New Product</b></h1>
      <table align="left">
      <tr><td style="padding-bottom: 10px;"><b> Name: </b> <input type="text" name="name" size="25" maxlength="60"  /></td></tr>
      <tr><td style="padding-bottom: 10px;"><b>Image: </b> <input type="file" name="img" /></td></tr>
      <tr><td style="padding-bottom: 10px;"><b> Price (RM): </b><input type="text" name="price" size="25" maxlength="60" required></td></tr><br>
      <tr><td style="padding-bottom: 10px"><b> Type: </b><input type="text" name="type" size="25" maxlength="60" required></td></tr><br>
      
      <tr><td><button type="submit" name="submit" value="Submit" style="width: 200px">Add </button></td></tr>

      
      </table>
	</form></div>
	
    <?php
    }
    ?>