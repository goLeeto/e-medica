<?php
	include 'connect.inc.php';
if (isset($_POST['diagnosa'])&&isset($_POST['id'])) {
	session_start();
	$diagnosa=mysqli_real_escape_string($conn,$_POST['diagnosa']);
	$personi=mysqli_real_escape_string($conn,$_POST['id']);
	$sql="INSERT INTO diagnostifikim (`personi`,`semundja`) VALUES ('$personi','$diagnosa')";
	$result=mysqli_query($conn,$sql);
}
?>