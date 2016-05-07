<?php 
session_start();
include "connect.inc.php";
$uname=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
$doktor=mysqli_real_escape_string($conn,$_SESSION['doktori']);
$result1 = mysqli_query($conn,"SELECT * FROM logs WHERE sender='".$uname."' AND receiver='".$doktor."' OR sender='".$doktor."' AND receiver='".$uname."' ORDER by id ASC");

while($extract = mysqli_fetch_array($result1)){

	$sender =strlen( $extract['sender']);
	if($sender==10){
		$class='sender_pacient';
	}else{
		$class='sender_doktor';
	}




  echo "<span class='".$class."'>". $extract['Emri']." ".$extract['Mbiemri'] . "</span>"."  :       "."<span class='mesazhi_span'>" 
 . $extract['msg']. "</span><br>"; 

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
      icon: 'http://cdn.sstatic.net/stackexchange/img/logos/so/so-icon.png',
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