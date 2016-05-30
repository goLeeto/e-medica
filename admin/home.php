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
			margin-top: 170px;
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
			display: block;
		}

		.logout_button{
			    float: right;
   				margin-top: 20px;
    			position: relative;
    			z-index: 1002;
    			height: 40px;
    			width: 100px;
    			background-color: #FF9933;
		}

		body {
			height: 850px;
   			border: none;
    		background-image: url("test1.png");
   			background-color: #E6E8D8;
    		opacity: 0.9;
		}

		#logo {
    		background-image: url("logoemedica2.png");
    		background-repeat: no-repeat;
    		background-size: 70%;
    		position: absolute;
    		width: 40%;
    		height: 30%;
    		margin-left: 3%;
    		z-index: 10002;
    		margin-top: 10px;
		}


		#header_image {
    background: url("header.png");
    background-repeat: no-repeat;
    background-size: 100% 100%;
    width: 1280px;
    height: 80px;
}
		</style>
	</head>
	<body>
		<div>
			<a href="../logout.php"><button class="logout_button">Log Out</button></a>
		</div>
			<div>
			<div>
			<div id="header_image"></div>
			<div id="logo"></div>
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
			</div>
	</body>
</html>
<?php
}
?>
