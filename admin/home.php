<?php 
session_start();
if(!isset($_SESSION["sess_user"])){

	header("Location: ../index.php");

}else {
	
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Home</title>
		<style type="text/css">
		table{
			margin-left: 80px;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#liste_doktoresh{
			margin-top: 100px;
			border: 2px solid #ccc;
			width: 400px;
			height: 500px;
			overflow: auto;

		}

		</style>
	</head>
	<body>
		<div>
			<a href="../logout.php"><button style="cursor:pointer" class="logout_button">Log Out</button></a>
		</div>
			<div>
				<div class="panel">
						<div class="panel_content">
							<div id="liste_doktoresh">
							
								<?php include 'getListeDoktoresh.php'; ?>
		
						
							</div>
								<div>
									
								</div>
						</div>
				
	</body>
</html>
<?php
}
?>
