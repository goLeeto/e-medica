<?php 
include 'connect.inc.php';
if (isset($_POST['user'])) {
	session_start();
	$doktori_familjes=$_POST['user'];
}
else{
$doktori_familjes = $_SESSION['sess_user'];
}
if(isset($_SESSION["sess_user"])){


$query = mysql_query("SELECT `users`.Emri , `users`.Mbiemri , `users`.username FROM `users`  INNER JOIN `logs`  ON `users`.username = `logs`.sender or `users`.username=`logs`.receiver  WHERE `users`.kategoria='pacient' && `users`.doktori_familjes='$doktori_familjes' GROUP BY `users`.username ORDER BY `logs`.id DESC ");

if($query === FALSE) { 
    die(mysql_error()); }
    echo "<ul class='li_mesazhe'>";
while($extract = mysql_fetch_array($query)){
	$id=$extract['username'];
	$query2= mysql_query("SELECT lexuar FROM logs WHERE sender='$id' AND receiver='$doktori_familjes'");
	$klasa="lexuar";
	while($result=mysql_fetch_array($query2)){
		if($result['lexuar']==0)
		{
			$klasa= "palexuar";
		}
		else
		{
			$klasa="lexuar";
		}

	}
echo "<li id='".$id."' class='".$klasa."' >" .$extract['Emri']." ".$extract['Mbiemri']."</li>"; 
}
echo "</ul>";
}

 ?>