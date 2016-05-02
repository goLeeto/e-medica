<?php 
include 'connect.inc.php';
session_start();
if (!isset($_SESSION['sess_user'])) {
	header('Location: ../index.php');
}
else {
if (isset($_POST['submit'])) {
	$ekzistues= $_POST['modifiko'];
	?>
	 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form action="modifiko.php" method="POST">
 	Doktori Ekzistues: <input type="text" id="ekzistues" name="ekzistues" readonly value="<?php echo $ekzistues; ?>" /> </br>
 	Doktori Zevendesues: <input type="text" id="zevendesues" name="zevendesues"/>
 	<input type="Submit" id="ndrysho" name="ndrysho" value="Ndrysho"/>
 </form>
 </body>
 </html>


	<?php


}
if (isset($_POST['ndrysho'])) {
	$zevendesues = $_POST['zevendesues'];
	$ekzistues = $_POST['ekzistues'];
	$sql= ("UPDATE users SET doktori_familjes = '$zevendesues' WHERE doktori_familjes= '$ekzistues' ");
	$result = mysql_query($sql);
	 if ($result) {
	 	$sql = ("DELETE FROM users WHERE username= '$ekzistues'");
	 	$result = mysql_query($sql);
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