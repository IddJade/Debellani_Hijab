<?php
session_start();
if(!isset($_SESSION["sess_email"])){
header("Location: order.php");
}
else
{
?>
<html>

<style>
body,h1,h2,h3,h4,h5,h6 {
    font-family: Calibri;
    }
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color:black;
   }
li {
    float: left;
   }
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }
li a:hover:not(.active) {
    background-color: #111;
    }
.active {
    background-color: brown;
    }
</style>

<body class="w3-content w3-border-left w3-border-right">

   
   <div class="w3-main w3-white" style="margin-left:240px" >

   
   <?php # add_cart.php
   // This page adds painting to the shopping cart.
   if (is_numeric ($_GET['pid'])) { // Check for a print ID.
   
   	$pid = $_GET['pid'];
   	
   	// Set the page title and include the HTML header.
   	$page_title = 'Add to Cart';
   
   	// Check if the cart already contains one of these painting.
   	if (isset ($_SESSION['cart'][$pid])) {
   		$qty = $_SESSION['cart'][$pid] + 1;
   	} else {
   		$qty = 1;
   	}
   	
   	// Add to the cart session variable.
   	$_SESSION['cart'][$pid] = $qty;
   
   	// Display a message.
   	header("Location: view_cart.php");
   
   } else { // Redirect
   	header ("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/order.php");
   	exit();
   }
   
   ?>



   
</body>
</html>
<?php
}
?>