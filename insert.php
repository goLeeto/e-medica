
<?php 
session_start();
if(isset($_SESSION["sess_user"])){
include "connect.inc.php";
$msg = $_REQUEST['msg'];
$uname=$_SESSION['sess_user'];
$doktor=$_SESSION['doktori'];

$queryemri=mysql_query("SELECT Emri, Mbiemri FROM users WHERE username='$uname'");

while ($emri=mysql_fetch_array($queryemri)) {
$emer=$emri['Emri'];
$mbiemer=$emri['Mbiemri'];
}
mysql_query("INSERT INTO logs(`sender` , `msg` , `receiver`,  `Emri`,`Mbiemri`) VALUES('$uname', '$msg' , '$doktor' , '$emer','$mbiemer')");

$result1 = mysql_query("SELECT * FROM logs WHERE sender='".$uname."' AND receiver='".$doktor."' OR sender='".$doktor."' AND receiver='".$uname."' ORDER by id ASC");

while($extract = mysql_fetch_array($result1)){
	$sender =strlen( $extract['sender']);
	if($sender==10){
		$class='sender_pacient';
	}else{
		$class='sender_doktor';
	}
  echo "<span class='".$class."'>". $extract['Emri']." ".$extract['Mbiemri'] . "</span>"."  :       "."<span class='mesazhi_span'>" 
 . $extract['msg']. "</span><br>"; 
 
}
}
?>