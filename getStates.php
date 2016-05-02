<?php 
	include'connect.inc.php';

	$partialStates = $_POST['partialState'];

	$states = mysql_query("SELECT * FROM semundje WHERE simptomat LIKE '%$partialStates%'");
	
	if(!empty($partialStates)){
		while($state = mysql_fetch_array($states)){
			?>
			<div class="article">
				<div class="item row">
					<div class="sem_name"><?php echo "<p class ='em_semundje'>Emri i semundjes:</p>".$state['emri']; ?></div>
					<p class="sem_simptoma"><?php echo $state['simptomat']; ?></p>
				</div>

				<div class="description row">
					<p><?php echo $state['pershkrimi']; ?></p>
				</div>
			</div>
			

		<?php	
		}
	}
?>