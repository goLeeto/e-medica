<?php 

include ("connect.inc.php");
$username=$_SESSION["sess_user"];
$sql = mysql_query("SELECT * FROM notification WHERE pacient_username='".$username."'");
		echo '<table id="njoftime">';
		while ($result = mysql_fetch_array($sql)) {
			$array['titulli'] = $result['titulli'];
			$array['permbajtja'] = $result['permbajtja'];
			echo "<tr> <td>".$result['titulli']."</td> <td> ".$result['permbajtja']."</td> </tr>";
		}
		echo "</table>";









 ?>