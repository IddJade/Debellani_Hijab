<?php
session_start();
if(!isset($_SESSION["sess_email"])){
header("Location: order.php");
}
else
{
    
   require_once ('includes/header.php');
?>
       <!-- Navigation bar -->
   <div class="w3-content"style="margin-left:180px">
   <div class="cover w3-container menu w3-padding-32" style="background: #F3F2F2; width: 100%; margin: 20px">
   <div class="w3-content w3-border" style="max-width:800px">
   <p class="w3-center"><i class="fa fa-shopping-bag fa-5x" ></i></p>
   <h2 class="w3-center">Thank You <?php echo $_SESSION['username']; ?></h2>
   <p class="w3-center w3-large">We'll see you soon</p>
   
  <?php
   $today = date("Ymd");
   $rand = strtoupper(substr(uniqid(sha1(time())),0,4));
   $unique = $today . $rand;
   echo"
	<div class=\"w3-row-padding\" style=\"margin:0 60px\">
	<div class=\"w3-hover-opacity-off\">
	        <h4 class=\"w3-center w3-white\">Order Number</h4>
	        <p class=\"w3-center\">".$unique."</p>
	</div>
	</div> \n";
	     
   require_once ('mysql_connect.php'); // Connect to the db.
   
    $username = $_SESSION['username']; 
    $phone = $_SESSION['phone'];	                             		
    	                             // Make the query.
    	$query = "SELECT * FROM users WHERE id = ".$_SESSION['id']."";		
    	$result = mysqli_query ($dbc, $query); // Run the query.
    	$num = mysqli_num_rows($result);
    	                             
    	if ($num > 0) { // If it ran OK, display the records.           
    	                                            	
    	                                            	
    	                             	// Fetch and print all the records.
    	while ($row = mysqli_fetch_assoc($result)) {	    	
	$address = $row['address'];
		     	     }
	}
  

   
   require_once 'mysql_connect.php';
   $page_title = 'My order';
   
   $query = 'SELECT * FROM product WHERE id IN (';
   foreach ($_SESSION['cart'] as $key => $value) 
   {
        $query .= $key . ',';
   }
        $query = substr ($query, 0, -1) . ') ORDER BY name ASC';
        $result = mysqli_query ($dbc,$query);


	$total = 0; // Total cost of the order.
	while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) {
	$subtotal = $_SESSION['cart'][$row['id']] * $row['price'];
	$total += $subtotal;  
        $queryint = "INSERT INTO orders(id, prod_name, quantity, type, price, order_number, address, cust_name, cust_phone) 
        VALUES ('','{$row['name']}','".($_SESSION['cart'][$row['id']])."','{$row['type']}','$subtotal','$unique','$address','$username', '$phone')";
        $resultin = mysqli_query($dbc, $queryint) or die(mysqli_error($dbc)) ;

  }
  echo"<center><a class=\"w3-button w3-black \" href=\"destroy_session.php\">GOT IT</a><br/><br/></center> \n";   

   
?>
   
   </div>
   </div>
   </div>
   

<?php
}
?>