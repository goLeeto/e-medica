
<?php 
session_start();
if(isset($_SESSION["sess_user"])){
include "connect.inc.php";
$uname = $_SESSION['sess_user'];
$msg = $_REQUEST['msg'];
$pacient=$_REQUEST['id'];
$queryemri=mysqli_query($conn,"SELECT Emri, Mbiemri FROM users WHERE username='$uname'");

while ($emri=mysqli_fetch_array($queryemri)) {
$emer=$emri['Emri'];
$mbiemer=$emri['Mbiemri'];
}
$limit= 30;
mysqli_query($conn,"INSERT INTO logs(`sender`, `msg` , `receiver`, `Emri`,`Mbiemri`,`lexuar`) VALUES('$uname', '$msg', '$pacient' , '$emer','$mbiemer','0')");

$result1 =  mysqli_query($conn,"SELECT * FROM (SELECT * FROM logs WHERE sender='$uname' AND receiver='$pacient' OR sender='$pacient' AND receiver='$uname' ORDER by id DESC LIMIT $limit) AS test ORDER BY id ASC");

$result2 = mysqli_query($conn,"SELECT Emri , Mbiemri FROM users WHERE username = '$uname' OR username='$pacient' ORDER BY username ASC");
$emri=mysqli_fetch_array($result2);
while($extract = mysqli_fetch_array($result1)){
	$sender =strlen( $extract['sender']);
	if($sender==15){
		$class='sender_pacient';
	}else{
		$class='sender_doktor';
	}
 echo "<span class='".$class."'>". $extract['Emri']." ".$extract['Mbiemri'] . "</span>"."  :       "."<span class='mesazhi_span'>" 
 . $extract['msg']. "</span><br>"; 
}
}
?>﻿