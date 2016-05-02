<?php 


session_start();
include 'connect.inc.php';
$doktori=$_SESSION['sess_user'];
if (isset($_POST['id'])) {
	$pacient=$_POST['id'];
	mysqli_query($conn,"UPDATE logs SET lexuar=1 WHERE sender='".$pacient."' AND receiver='".$doktori."' ");
}

 ?>