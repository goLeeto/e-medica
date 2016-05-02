<?php 
	session_start();
	include 'connect.inc.php';
	if(isset($_POST['id']) && isset($_POST['titullinjoftimit']) && isset($_POST['permbajtjanjoftimit']) && isset($_POST['data']) && isset($_POST['time'])){
		$doktor = mysqli_real_escape_string($conn,$_SESSION['sess_user']);
		$pacient= mysqli_real_escape_string($conn,$_POST['id']);
		$titulli = mysqli_real_escape_string($conn,$_POST['titullinjoftimit']);
		$permbajtja = mysqli_real_escape_string($conn,$_POST['permbajtjanjoftimit']);
		$data = mysqli_real_escape_string($conn,$_POST['data']);
		$ora=mysqli_real_escape_string($conn,$_POST['time'].":00");
		$sql = mysqli_query($conn,"INSERT INTO notification(titulli, permbajtja, pacient_username, doktori, data, ora) VALUES ('$titulli','$permbajtja','$pacient','$doktor','$data','$ora')");


	}



 ?>