
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
 <style>
     
 body,h1,h2,h3,h4,h5,h6, p {font-family: "Karma", sans-serif}

  
  ul {
  list-style-type: none;
  height: 100px;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: whitesmoke;
  box-shadow: 5px 5px 5px grey;
}

li {
  float: left;
}

li.right { 
  float: right;
}

li a {
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  color: #fff;
  background-color: #000;
  border-bottom-right-radius: 50px 20px;
  border-top-left-radius: 50px 20px;
}

div.head { 
    width: 100%;
    float: center;
}
</style>
<body>
  <head><title>Delicacies Accessories</title></head>

<?php 
  if(!isset($_SESSION["sess_email"])){
      ?>

 <div class="head">    
<ul>
<li><h1><a class="active" href="index.php">HOME</a></h1></li>
<li class="right"><h1 class="a"><a href="order.php">SIGNUP/LOGIN</a></h1></li>
 </ul></div>

 <?php
}
else
{
?>

<div class="head">    
<ul>
<li><h1><a class="active" href="index.php">HOME</a></h1></li>
<li class="right"><h1><a href="logout.php">SIGN OUT</a></h1></li>
<li class="right"><h1><a href="view_cart.php">VIEW CART</a></h1></li>
 </ul></div>
 <?php
}
?>

</html>