<?php 
include ('connect.inc.php');
$gis  = array();



$result1 = mysqli_query($conn,"SELECT * FROM qsh");
while($extract = mysqli_fetch_array($result1)){
$values = array();
array_push($values, $extract["Id"]);
array_push($values, $extract["lat"]);
array_push($values, $extract["lng"]);
array_push($values, $extract["name"]);
array_push($values, $extract["val"]);
array_push($gis, $values);
}
echo json_encode($gis);


 ?>