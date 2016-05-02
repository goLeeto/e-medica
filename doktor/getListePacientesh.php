<?php 
include 'connect.inc.php';
echo "<ul class= 'li_pacient'>";
if(isset($_POST['shto'])){
	session_start();
	$doktori_familjes = $_SESSION['sess_user'];
	$query = mysql_query("SELECT * FROM users WHERE kategoria='pacient' && doktori_familjes='$doktori_familjes'");
	while($result = mysql_fetch_array($query)){
	echo "<li id=".$result['username'].">" .$result['Emri']." ".$result['Mbiemri']."</li>"; 
}
}else if(isset($_POST['fshi1'])){
session_start();
	$doktori_familjes = $_SESSION['sess_user'];
	$query = mysql_query("SELECT * FROM users WHERE kategoria='pacient' && doktori_familjes='$doktori_familjes'");
	while($result = mysql_fetch_array($query)){
	echo "<li id=".$result['username'].">" .$result['Emri']." ".$result['Mbiemri']."</li>"; 
}
	
}
else {
$doktori_familjes = $_SESSION['sess_user'];
if(isset($_SESSION["sess_user"])){
$query = mysql_query("SELECT * FROM users WHERE kategoria='pacient' && doktori_familjes='$doktori_familjes'");
if($query === FALSE) { 
    die(mysql_error()); }}
    echo "<ul class= 'li_pacient'>";
while($extract = mysql_fetch_array($query)){
echo "<li id=".$extract['username'].">" .$extract['Emri']." ".$extract['Mbiemri']."</li>"; 
}
echo "</ul>";
}
echo "</ul>";

 ?>