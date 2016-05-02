<?php 

include ("connect.inc.php");
$username=mysqli_real_escape_string($conn,$_SESSION["sess_user"]);
$sql = mysqli_query($conn,"SELECT * FROM notification WHERE pacient_username='".$username."'");
		echo '<table id="njoftime">';
		while ($result = mysqli_fetch_array($sql)) {
			$array['titulli'] = $result['titulli'];
			$array['permbajtja'] = $result['permbajtja'];
			echo "<tr> <td>".$result['titulli']."</td> <td> ".$result['permbajtja']."</td> </tr>";
		}
		echo "</table>";









 ?>