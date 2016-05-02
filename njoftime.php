<?php 

include ("connect.inc.php");
if(!isset($_SESSION['sess_user'])){
	session_start();
}
$username=mysqli_real_escape_string($conn,$_SESSION["sess_user"]);
$sql = mysqli_query($conn,"SELECT * FROM notification WHERE pacient_username='".$username."' ORDER BY id DESC LIMIT 3");
$data = date('Y-m-d');
$deleteoldnotification=mysqli_query($conn,"DELETE FROM notification WHERE data <'$data'");
		
		while ($result = mysqli_fetch_array($sql)) {
			echo "<div id='njoftime_pacient_table'>";
			echo '<table  id="njoftime">';
			$titulli=$result['titulli'];
			$permbajtja=$result['permbajtja'];
			$data= $result['data'];
			$ora = substr($result['ora'],0,5);

			echo "<tr> <td><div id='titulli_njoftimit'>".$titulli."</td></div></tr> <tr><td> ".$permbajtja."</td></tr> <tr><td>".$ora." ".$data."</td> </tr>";
			echo "</table>";
			echo "</div>";
		}
		









 ?>