<?php 
include ('connect.inc.php');
$name = $_POST["name"];
$sql = "DELETE FROM qsh WHERE `name` = '$name'";
mysqli_query($conn,$sql);
 ?>