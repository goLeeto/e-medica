
<?php 
session_start();
if(isset($_SESSION["sess_user"])){
include "connect.inc.php";
$msg = mysqli_real_escape_string($conn,$_REQUEST['msg']);
$uname=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
$doktor=mysqli_real_escape_string($conn,$_SESSION['doktori']);

$queryemri=mysqli_query($conn,"SELECT Emri, Mbiemri FROM users WHERE username='$uname'");

while ($emri=mysqli_fetch_array($queryemri)) {
$emer=$emri['Emri'];
$mbiemer=$emri['Mbiemri'];
}
mysqli_query($conn,"INSERT INTO logs(`sender` , `msg` , `receiver`,  `Emri`,`Mbiemri`) VALUES('$uname', '$msg' , '$doktor' , '$emer','$mbiemer')");

$result1 = mysqli_query($conn,"SELECT * FROM logs WHERE sender='".$uname."' AND receiver='".$doktor."' OR sender='".$doktor."' AND receiver='".$uname."' ORDER by id ASC");

while($extract = mysqli_fetch_array($result1)){

	$sender =strlen( $extract['sender']);
  $name = $extract['Emri'];
    $firstLetter = strtoupper($name[0]);
    $last= $extract['Mbiemri'];
      $lastLetter = strtoupper($last[0]);
if (strcmp($previousE,$extract['Emri'])==0 && strcmp($previousM,$extract['Mbiemri'])==0) {
	if($sender==10){
		$class='sender_pacient1';
echo "<div class='msg-container right'><div class='mesazhi_span'>" 
 . $extract['msg']. "</div><div style='visibility:hidden;' class='".$class."'></div></div>"; 
     
	}else{
		$class='sender_doktor1';
echo "<div class='msg-container left'><div style='visibility:hidden;' class='".$class."'><div class='inicialet'>". $firstLetter." ".$lastLetter . "</div></div><div class='mesazhi_span'>" 
 . $extract['msg']. "</div></div>";

	}
}else{
  if($sender==10){
    $class='sender_pacient';

echo "<div class='msg-container right right1'><div class='mesazhi_span'>" 
 . $extract['msg']. "</div><div class='".$class."'><div class='inicialet'>". $firstLetter." ".$lastLetter . "</div></div></div>"; 
     
  }else{
    $class='sender_doktor';
echo "<div class='msg-container left left1'><div class='".$class."'><div class='inicialet'>". $firstLetter." ".$lastLetter . "</div></div><div class='mesazhi_span'>" 
 . $extract['msg']. "</div></div>";

  }
}
  $previousE=$extract['Emri'];
  $previousM=$extract['Mbiemri']; 

 
}
}
?>
