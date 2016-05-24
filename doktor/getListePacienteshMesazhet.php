<?php 

include 'connect.inc.php';

if (isset($_POST['user'])) {
	session_start();
	$doktori_familjes=mysqli_real_escape_string($conn,$_POST['user']);
}
else{
$doktori_familjes = mysqli_real_escape_string($conn,$_SESSION['sess_user']);
}
if(isset($_SESSION["sess_user"])){
$uname=mysqli_real_escape_string($conn,$_SESSION['sess_user']);
$limit=30;

$query = mysqli_query($conn,"SELECT `users`.Emri , `users`.Mbiemri , `users`.username FROM `users`  INNER JOIN `logs`  ON `users`.username = `logs`.sender or `users`.username=`logs`.receiver  WHERE `users`.kategoria='pacient' && `users`.doktori_familjes='$doktori_familjes' GROUP BY `users`.username ORDER BY `logs`.id DESC ");

if($query === FALSE) { 
    die(mysqli_error()); }
    echo "<ul class='li_mesazhe'>";
while($extract = mysqli_fetch_array($query)){
	$id=$extract['username'];
	$query2= mysqli_query($conn,"SELECT lexuar FROM logs WHERE sender='$id' AND receiver='$doktori_familjes'");
	$klasa="lexuar";
	$result2 = mysqli_query($conn,"SELECT * FROM (SELECT * FROM logs WHERE   receiver='$uname' ORDER by id DESC LIMIT $limit) AS test ORDER BY id ASC");
	while($result=mysqli_fetch_array($query2)){
		if($result['lexuar']==0)
		{
			$klasa= "palexuar";
			while($extract1 = mysqli_fetch_array($result2)){
	if($extract1['new']==0 && $extract1['receiver']==$uname){
 	$message = $extract1['msg'];
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
    var notification = new Notification('New Message From <?php echo $extract1['Emri'];?>', {
      icon: '../includes/chatIcon.png',
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

 	mysqli_query($conn,"UPDATE logs SET new = 1 WHERE  receiver='".$uname."' ORDER by id ASC ");
	
	}
}

		}
		else
		{
			$klasa="lexuar";
		}

	}
	if($klasa == 'palexuar'){
		echo "<li id='".$id."' class='".$klasa."' >" .$extract['Emri']." ".$extract['Mbiemri']." </li>"; 

	}else{
		echo "<li id='".$id."' class='".$klasa."' >" .$extract['Emri']." ".$extract['Mbiemri']."</li> "; 

	}
}
echo "</ul>";
}

 ?>