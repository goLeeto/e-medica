<?php 
include 'connect.inc.php';
session_start();
if (!isset($_SESSION['sess_user'])) {
	header('Location: ../index.php');
}
else {
if (isset($_POST['submit'])) {
	$ekzistues= mysqli_real_escape_string($conn,$_POST['modifiko']);
	?>
	 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form action="modifikoPassword.php" method="POST">
 	Username: <input type="text" id="ekzistues" name="ekzistues" readonly value="<?php echo $ekzistues; ?>" /> </br>
 	Passwordi i ri: <input type="text" id="passiri" name="passiri"/></br>
 	Perserit Passwordin i ri: <input type="text" id="passiri2" name="passiri2"/>
 	<input type="Submit" id="ndrysho" name="ndrysho" value="Ndrysho"/>
 </form>
 </body>
 </html>


	<?php

}

if (isset($_POST['ndrysho'])) {
	$ekzistues = mysqli_real_escape_string($conn,$_POST['ekzistues']);
	$passiri = mysqli_real_escape_string($conn, md5($_POST['passiri']));
	$sql= ("UPDATE users SET Password = '$passiri' WHERE username= '$ekzistues'");
	$result = mysqli_query($conn,$sql);
	 if ($result) {
	 	$result = mysqli_query($conn,$sql);
	 	if ($result){


	 	echo "ok";
		?>
		<a href="home.php"><button>Go to home page</button></a>
		<?php
	 }else{
	 	echo "not ok";
	 }
	}else {
		echo "not ok1";
	}

}

 ?>

 <?php 
}
?>