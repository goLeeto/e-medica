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
	$name = $extract['Emri'];
	$firstLetter = strtoupper($name[0]);
    $last= $extract['Mbiemri'];
      $lastLetter = strtoupper($last[0]);

	if($sender==15){
		$class='sender_pacient';
		echo "<div class='msg-container right'><div class='mesazhi_span'>" 
 . $extract['msg']. "</div><div class='".$class."'><div class='inicialet'>". $firstLetter." ".$lastLetter . "</div></div></div><br><br><br><br>"; 
 
	}else{
		$class='sender_doktor';
		echo "<div class='msg-container left'><div class='".$class."'><div class='inicialet'>". $firstLetter." ".$lastLetter . "</div></div><div class='mesazhi_span'>" 
 . $extract['msg']. "</div></div><br>";
	}

}
?>﻿