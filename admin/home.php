<?php 
session_start();
if(!isset($_SESSION["sess_user"])){

	header("Location: ../index.php");

}else {
	
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title>Administration E-Medica</title>
		<style type="text/css">
		table{
			margin-left: 80px;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		#liste_doktoresh{
			margin-top: 100px;
			border: 2px solid #ccc;
			width: 500px;
			height: 500px;
	
			display: inline-block;

		}

		#liste_pacientesh{
			margin-top: 100px;
			border: 2px solid #ccc;
			width: 500px;
			height: 500px;
			display: inline-block;
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
								<h2 style="text-align:center">Lista e doktoreve</h2>
							
								<?php include 'getListeDoktoresh.php'; ?>
		
						
							</div>
								<div>
									
								</div>
						</div>
						
				</div>
			</div>	

			<!--Liste pacientesh -->
			<div>
				<div class="panel">
						<div class="panel_content">
							<div id="liste_pacientesh">	
								<h2 style="text-align:center">Lista e pacienteve</h2>
							
								<?php include 'getListePacientesh.php'; ?>
		
						
							</div>
								<div>
									
								</div>
						</div>
						
				</div>
			</div>	
	</body>
</html>
<?php
}
?>
