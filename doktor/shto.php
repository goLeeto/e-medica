<?php 
	include 'connect.inc.php';
	session_start();
	if(isset($_POST['shto'])){
		$username = $_POST['shto'];
		$doktor= $_SESSION['sess_user'];
		$sql= ("UPDATE users SET doktori_familjes= '$doktor' WHERE username='$username'");
		$result=mysql_query($sql);
		if($result){
			echo "Perdoruesi u shtua ne listen e pacienteve";
		}else{
			echo "Dicka shkoi gabim";
		}

	}else if(isset($_POST['fshi'])){
		$username = $_POST['fshi'];
		$sql= ("DELETE FROM users WHERE username='$username'");
		$result=mysql_query($sql);
		if($result){
			echo "Pacienti u fshi nga lista e pacienteve";
		}else{
			echo "Dicka shkoi gabim";
		}
	}	
 ?>