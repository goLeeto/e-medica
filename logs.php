<?php 
session_start();
include "connect.inc.php";
$uname=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
$doktor=mysqli_real_escape_string($conn,$_SESSION['doktori']);
$result1 = mysqli_query($conn,"SELECT * FROM logs WHERE sender='".$uname."' AND receiver='".$doktor."' OR sender='".$doktor."' AND receiver='".$uname."' ORDER by id ASC");
$previousE=" ";
$previousM=" ";
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


  

 if($extract['new']==0 && $extract['receiver']==$uname){
 	$message = $extract['msg'];
		// show notification
 	?>
 	<script type="text/javascript">

 		document.addEventListener('DOMContentLoaded', function () {
  if (Notification.permission !== "granted")
    Notification.requestPermission();
});

  if (Notification.permission !== "granted")
    Notification.requestPermission();
  else {
    var notification = new Notification('New Message From <?php echo $extract['Emri'];?>', {
      icon: 'includes/chatIcon.png',
      body: '<?php echo $message;?>',
      tag: "#edison",
    });
    var filename = '1';
    document.getElementById("sound").innerHTML=
    '<audio autoplay="autoplay"><source src="' + filename + '.mp3" type="audio/mpeg" /><source src="' + filename + '.ogg" type="audio/ogg" /><embed hidden="true" autostart="true" loop="false" src="' + filename +'.mp3" /></audio>';

    notification.onclick = function () {
    window.focus();
    notification.close()
  };
    
  }



 	</script>




 	<?php

 	mysqli_query($conn,"UPDATE logs SET new = 1 WHERE sender='".$uname."' AND receiver='".$doktor."' OR sender='".$doktor."' AND receiver='".$uname."' ORDER by id ASC ");
	
	}
}

?>﻿