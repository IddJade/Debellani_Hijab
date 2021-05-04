<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
.w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
.w3-half img:hover{opacity:1}
</style>
<body>
  <head><title> Admin Delicacies </title></head>

  <?php 
    if(!isset($_SESSION["sess_email"])){
      ?>

<nav class="w3-sidebar w3-black w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;">
<div class="w3-bar-block">
  
  <div class="w3-bar-block">
    <a href="/ACC/index.php" class="w3-bar-item w3-button w3-hover-dark-blue">GO TO WEBSITE </a>
    <a href="admin_product.php" class="w3-bar-item w3-button w3-hover-dark-blue">PRODUCTS</a> 
    <a href="admin_cust.php" class="w3-bar-item w3-button w3-hover-dark-blue">CUSTOMERS</a> 
    <a href="admin_customer.php" class="w3-bar-item w3-button w3-hover-dark-blue">ORDERS</a> 
    <a href="admin_logout.php" class="w3-bar-item w3-button w3-hover-dark-blue">LOGOUT</a>
  </div></nav>


<div>
<?php
}
else
{
?>

<div>
</div>
<?php 
}
?>
 

