<?php

session_start ();

require_once 'mysql_connect.php';


$id = $_POST['id'];

//$invoice_no = trim ( $_POST ['invoice_no'] );
$id = trim ( $_POST ['id'] );
$name = trim ( $_POST ['name'] );
$price = trim ( $_POST ['price'] );


$sql = "UPDATE `product` SET name='".$_POST['name']."', price='".$_POST['price']."', type='".$_POST['type']."'  WHERE id='".$_POST['id']."'";



// echo $sql;

$result = mysqli_query($dbc, $sql);

mysqli_close($dbc);

header("Location:admin_product.php");

?>