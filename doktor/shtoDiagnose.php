<?php
	include 'connect.inc.php';
if (isset($_POST['diagnosa'])&&isset($_POST['id'])) {
	session_start();
	$diagnosa=$_POST['diagnosa'];
	$personi=$_POST['id'];
	$sql="INSERT INTO diagnostifikim (`personi`,`semundja`) VALUES ('$personi','$diagnosa')";
	$result=mysql_query($sql);
}
?>