<?php 

include ("connect.inc.php");
if(!isset($_SESSION['sess_user'])){
	session_start();
}
$username=$_SESSION["sess_user"];
$sql = mysql_query("SELECT * FROM notification WHERE pacient_username='".$username."' ORDER BY id DESC LIMIT 3");
$data = date('Y-m-d');
$deleteoldnotification=mysql_query("DELETE FROM notification WHERE data <'$data'");
		
		while ($result = mysql_fetch_array($sql)) {
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