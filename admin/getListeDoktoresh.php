<?php 
include 'connect.inc.php';
$doktori_familjes = mysqli_real_escape_string($conn,$_SESSION['sess_user']);
if(isset($_SESSION["sess_user"])){
$query = mysqli_query($conn,"SELECT * FROM users WHERE kategoria='doktor'");
if($query === FALSE) { 
    die(mysqli_error()); }
    echo "<table border='1'>";
while($extract = mysqli_fetch_array($query)){
	$emri = $extract['Emri'];
	$mbiemri = $extract['Mbiemri'];
	$id = $extract['username'];
?>
	<tr> 

	<td> <?php echo $emri." ".$mbiemri;?></td>
	<td>
	<form action='modifiko.php' method='POST'> 
	<input type='hidden' value=<?php echo $id; ?> name='modifiko'/>
	</td>
	<td><input type='submit' id='submit' name='submit' value='Ndrysho Mjekun' style="cursor:pointer; background-color: #FF9933;
    line-height: 30px;
    color: #4B4B4D;
    border-radius: 4px;
    padding-left: 5px;
    padding-right: 5px;
    cursor: pointer;"/></form></td>

	<form action='modifikoPassword.php' method='POST'> 
	<input type='hidden' value=<?php echo $id; ?> name='modifiko'/>
	</td>
	<td><input type='submit' id='submit' name='submit' value='Ndrysho Password' style="cursor:pointer; background-color: #FF9933;
    line-height: 30px;
    color: #4B4B4D;
    border-radius: 4px;
    padding-left: 5px;
    padding-right: 5px;
    cursor: pointer;" /></form></td>
	</tr>
		
		<?php				
						}

						echo "</table>";
}



 ?>