<?php 
	include'connect.inc.php';
	session_start();
	$doktor = $_SESSION['sess_user'];
	$checked = $_POST['checked'];
	$partialStates = $_POST['partialState'];
	if(substr($partialStates,0,strpos($partialStates, " "))){
	$emri=substr($partialStates,0,strpos($partialStates, " "));
	$mbiemri = substr($partialStates,(strpos($partialStates, " ")+1));
}else{
	$emri =$partialStates ;
	$mbiemri = "";
}
	if($checked==0){
	$states = mysql_query("SELECT * FROM users WHERE Emri LIKE '$emri%'  AND Mbiemri LIKE '%$mbiemri%' AND doktori_familjes='$doktor'  ");
	}else{
	$states = mysql_query("SELECT * FROM users WHERE Emri LIKE '$emri%'  AND Mbiemri LIKE '%$mbiemri%' AND kategoria='pacient'  ");
	}
if(!empty($partialStates)){
		while($state = mysql_fetch_array($states)){
			?>
			<div class="article">
				<div class="item row">
					<div  class="sem_name"><?php echo $state['Emri']." ".$state['Mbiemri']; ?></div>
				</div>

				<div class="description row">
					<div id="buttons">
						<button id="<?php echo $state['username']; ?>" class="shto" >Shto Pacient</button>
						<button id="<?php echo $state['username']; ?>" class="fshi" >Fshi Pacient</button>
						<button id="<?php echo $state['username']; ?>" class="open_profile">Profili</button>
					</div>
				</div>
			</div>
			

		<?php	
		}
	}


