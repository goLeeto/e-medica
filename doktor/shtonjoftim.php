<?php 
	session_start();
	include 'connect.inc.php';
	if(isset($_POST['id']) && isset($_POST['titullinjoftimit']) && isset($_POST['permbajtjanjoftimit']) && isset($_POST['data']) && isset($_POST['time'])){
		$doktor = $_SESSION['sess_user'];
		$pacient= $_POST['id'];
		$titulli = $_POST['titullinjoftimit'];
		$permbajtja = $_POST['permbajtjanjoftimit'];
		$data = $_POST['data'];
		$ora=$_POST['time'].":00";
		$sql = mysqli_query($conn,"INSERT INTO notification(titulli, permbajtja, pacient_username, doktori, data, ora) VALUES ('$titulli','$permbajtja','$pacient','$doktor','$data','$ora')");


	}



 ?>