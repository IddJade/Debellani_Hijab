<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<style>
      body,h1,h2,h3,h4,h5,h6, p {font-family: "Karma", sans-serif}

      nav { 
          padding: 20px;
          margin: 20px;
          float: left;
      }
    </style>
<?php
session_start();
if(!isset($_SESSION["sess_email"])){
header("Location: order.php");
}
else
{

   require_once ('includes/header.php');
?>
<script type="text/javascript">
function deleteOrder(id) {
	if (confirm("Are you sure you want to delete?")) {
		window.location.href = 'admin_product?deleteOrder='+ id;
		return true;
	} else {
		return false;
	 }
}
</script>

   <div class="w3-container" ><br/><br/>
   <hr>
 <?php # view_cart.php
     // This page displays the contents of the shopping cart.
     
     // Set the page title and include the HTML header.
     $page_title = 'View Your Shopping Cart';
     // Check if the form has been submitted (to update the cart).
     if (isset ($_POST['submit'])) {
     	foreach ($_POST['qty'] as $key => $value) {
     		if ( ($value == 0) AND (is_numeric ($value)) ) {
     			unset ($_SESSION['cart'][$key]);
     		} elseif ( is_numeric ($value) AND ($value > 0) ) {
     		      $_SESSION['cart'][$key] = $value;
     		}
     	}
		
		     }
		     
     // Check if the shopping cart is empty.
     $empty = TRUE;
     if (isset ($_SESSION['cart'])) {
     	foreach ($_SESSION['cart'] as $key => $value) {
     		if (isset($value)) {
     		$empty = FALSE;	
     		}
     	} 
     }
              
     // Display the cart if it's not empty.
     if (!$empty) {
     
     require_once ('mysql_connect.php'); // Connect to the database.
     
     	// Retrieve all of the information for the prints in the cart.
       $query = 'SELECT * FROM product WHERE id IN (';
       foreach ($_SESSION['cart'] as $key => $value) 
	{
     		$query .= $key . ',';
     	}
     	$query = substr ($query, 0, -1) . ') ORDER BY name ASC';
        $result = mysqli_query ($dbc,$query);
     	
     	// Create a table and a form.
     	echo '<nav>
     	  </div>
       	</div>
	     <table border="0" width="800px" cellspacing="30" cellpadding="3" align="center" style="color:black">
         <tr>   
         <td align="left" width="10%"></td>
         <h4><center>Set quantity to "0" to remove item.</center></h4>
     		<td align="left" width="10%"><h4><b>Product</b></h4></td>
     		<td align="center" width="10%"><h4><b>Price</b></h4></td>
				 <td align="left" width="10%"><h4><b>Quantity</b></h4></td>
				 <td align="left" width="10%"><h4><b>Type</b></h4></td>
     		<td align="left" width="10%"><h4><b>Total</b></h4></td>
     	</tr>    </nav>
     <form action="view_cart.php" method="post">
     ';
     
     	// Print each item.
     	$total = 0; // Total cost of the order.
        while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
     		
     		// Calculate the total and sub-totals. 
     		$subtotal = $_SESSION['cart'][$row['id']] * $row['price'];
     		$total += $subtotal;
   		
     		
     		// Print the row.
     		echo "	<tr>
		<td align=\"left\"><img src=\"./img/{$row['img']}\" alt=\"{$row['name']}\"  style='width:80px%;height:80px'></td>     
     		<td align=\"left\">{$row['name']}</td>
     		<td align=\"left\">RM{$row['price']}</td>
     		<td align=\"left\"><input type=\"text\" size=\"2\" name=\"qty[{$row['id']}]\" value=\"{$_SESSION['cart'][$row['id']]}\" /></td>
				<td align=\"left\">{$row['type']}</td>
				 <td align=\"left\">RM" . number_format ($subtotal, 2) . "</td>       		     		  		
	
     	</tr>\n";
     	} // End of the WHILE loop.
     	
     	// Print the footer, close the table, and the form.
     	echo '	<tr>
     	 <td colspan="1" align="right"><b>Total:<b></td>
     	          	 	          				         				         	 	      
     	<td align="left">RM' . number_format ($total, 2) . ' </td>
	<td align="left"><button type="submit" name="submit" class="w3-button w3-grey w3-round w3-margin-bottom">Update</button></td>
        </tr>
     	</table><hr><br/><br/>
	
	<div align="center"><a class="w3-button w3-round w3-grey w3-margin-bottom" href="index.php"><i class="fa fa-arrow-left"></i> Add Order</a>
        <a class="w3-button w3-grey w3-round w3-margin-bottom" href="add_checkout.php"><i class="fa fa-shopping-cart"></i> Proceed to Checkout <i class="fa fa-arrow-right"></i></a>
	</form> ';
	 
     } else {
     	echo '<p class="w3-text-red w3-center"><b>Your cart is currently empty.</b></p>';
     }
     ?>    
   </div>
   
</body>
</html>
<?php
}
?>