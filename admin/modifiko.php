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
 	<style type="text/css">
 	body {
			height: 850px;
   			border: none;
    		background-image: url("test1.png");
   			background-color: #E6E8D8;
    		opacity: 0.9;
		}

		input {
			color: orange;

			}

		#ndrysho {
			    background-color: #FF9933;
    line-height: 30px;
    color: #4B4B4D;
    border-radius: 4px;
    padding-left: 5px;
    padding-right: 5px;
    cursor: pointer;
			}</style>
 </head>
 <body>
 <form action="modifiko.php" method="POST">
 	Doktori Ekzistues: <input type="text" id="ekzistues" name="ekzistues" readonly value="<?php echo $ekzistues; ?>" /> </br>
 	Doktori Zevendesues: <input type="text" id="zevendesues" name="zevendesues"/>
 	<input type="Submit" id="ndrysho" name="ndrysho" value="Ndrysho" style="cursor:pointer" />
 </form>
 </body>
 </html>


	<?php


}
if (isset($_POST['ndrysho'])) {
	$zevendesues = mysqli_real_escape_string($conn,$_POST['zevendesues']);
	$ekzistues = mysqli_real_escape_string($conn,$_POST['ekzistues']);
	$sql= ("UPDATE users SET doktori_familjes = '$zevendesues' WHERE doktori_familjes= '$ekzistues' ");
	$result = mysqli_query($conn,$sql);
	 if ($result) {
	 	$sql = ("DELETE FROM users WHERE username= '$ekzistues'");
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