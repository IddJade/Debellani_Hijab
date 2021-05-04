<?php
DEFINE ('DB_USER','root');
DEFINE ('DB_PASSWORD','');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'delicacies');

$dbc= mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die ("could not connect to mysql"); 

mysqli_select_db($dbc,DB_NAME) or die ("no database"); 

?>