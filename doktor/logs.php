<?php 
session_start();
include "connect.inc.php";
$uname=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
if(isset($_POST['id'])){
$pacient=mysqli_real_escape_string($conn,$_POST['id']);
}

$limit=30;
$result1 = mysqli_query($conn,"SELECT * FROM (SELECT * FROM logs WHERE sender='$uname' AND receiver='$pacient' OR sender='$pacient' AND receiver='$uname' ORDER by id DESC LIMIT $limit) AS test ORDER BY id ASC");
			

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

?>﻿