<?php
	include 'connect.inc.php';

	$username = $_POST['user_id'];
	$sql=("SELECT * FROM users WHERE username='$username'");

	$result=mysqli_query($conn,$sql);
	echo "<div id='te_dhena_pers'><h2>Te dhenat personale</h2>";
	echo "<table id='pacient_info'>";
	while($extract=mysqli_fetch_array($result)){
		echo "<tr><td>Emri:</td><td>".$extract['Emri']."</td></tr>";
		echo "<tr><td>Mbiemri:</td><td>".$extract['Mbiemri']."</td></tr>";
		echo "<tr><td>Ditelindja:</td><td>".$extract['ditelindja']."</td></tr>";
		echo "<tr><td>Grupi i gjakut:</td><td>".$extract['grupi_gjakut']."</td></tr>";
		echo "<tr><td>Adresa:</td><td>".$extract['adresa']."</td></tr>";
	}	
	echo "</table>";
	echo "</div>";

	$query = mysqli_query($conn,"SELECT * FROM diagnostifikim WHERE personi='$username'");
	if($query === FALSE) { 
    	die(mysqli_error()); 
    }
    echo "<div id='te_dhena_mjek'><h2>Te dhenat mjekesore</h2>";
	echo "<table id='pacient_info_mjek'>";
	while($extract = mysqli_fetch_array($query)){
		echo "<tr><td>".$extract['semundja']."</td></tr>"."</br>"; 
	}
	echo "</table>";
	echo "</div>";
 ?>