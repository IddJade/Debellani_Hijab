<?php
session_start ();
require_once 'mysql_connect.php';
include ('header.php');
$id = $_GET['id'];

$sql = "select * from `product` WHERE id = $id";

// echo $sql;

$result = mysqli_query($dbc, $sql);
$record = mysqli_fetch_array($result);

// echo $record['id'];

?>
<div class="w3-main" style="margin-left:340px;margin-right:40px; padding-top: 80px">
<h1 align="left" class="w3-large w3-text-grey">Edit Menu</h1>
	<table align="left">
	<form action="process_editprod.php" method="post">
	<tr>
	<td style="font-weight: bold; padding-bottom: 10px" align="right">Name</td>
	<td style="padding-bottom: 10px">
	<input type="text" name="name" value="<?php echo $record['name']?>" />
	</td></tr>
	<tr>
	<td style="font-weight: bold; padding-bottom: 10px" align="right"> Price </td>
	<td style="padding-bottom: 10px">
	<input type="text" name="price" value="<?php echo $record['price']?>" />
	</td></tr>
	<tr>
	<td style="font-weight: bold; padding-bottom: 10px" align="right">Type</td>
	<td style="padding-bottom: 10px">
	<input type="text" name="type" value="<?php echo $record['type']?>" />
	</td></tr>
	<tr>
	<td>&nbsp;</td>
	<td style="padding-bottom: 10px">
	<input type="submit" name="con_submit" value="Save" /> 
	<input type="reset" name="con_reset" value="Reset" /> 
	<input type="button" value="Cancel" onclick="gotoList();" />
	<input type="hidden" name="id" value="<?php echo $record['id']; ?>">
	</td></table>