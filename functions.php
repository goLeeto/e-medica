<?php 
	include'connect.inc.php';

	function getUserData($username){
		global $conn;
		$usrname = mysqli_real_escape_string($conn,$username);
		$sql = mysqli_query($conn,"SELECT * FROM users WHERE username='".$usrname."'");
		while($result = mysqli_fetch_array($sql)){
			$array['username']= $result['username'];
			$array['emri']= $result['Emri'];
			$array['mbiemri']= $result['Mbiemri'];
			$array['ditelindja']= $result['ditelindja'];
			$array['gjinia']= $result['gjinia'];
			$array['grupi_gjakut']= $result['grupi_gjakut'];
			$array['adresa']= $result['adresa'];
			$array['doktori_familjes']= $result['doktori_familjes'];
		}
		return $array;
	}

	function getUserNotification($username){
		global $conn;
		$usrname = mysqli_real_escape_string($conn,$username);
		$sql = mysqli_query($conn,"SELECT * FROM notification WHERE pacient_username='".$usrname."'");
		
		while ($result = mysqli_fetch_array($sql)) {
			$array['titulli'] = $result['titulli'];
			$array['permbajtja'] = $result['permbajtja'];
		}
		if(!empty($array)){
		return $array;
	}
	}
 ?>