<?php 
session_start();
include "connect.inc.php";
$uname=$_SESSION['sess_user'];
$doktor=$_SESSION['doktori'];
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

?>﻿