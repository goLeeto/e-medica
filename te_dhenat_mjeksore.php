<?php 
include'connect.inc.php';
if(isset($_SESSION["sess_user"])){
$user = mysqli_real_escape_string($conn,$_SESSION["sess_user"]);
$query = mysqli_query($conn,"SELECT * FROM diagnostifikim WHERE personi='".$user."'");
if($query === FALSE) { 
    die(mysql_error()); }
    echo "<table id='mjekesore_table'>";
while($extract = mysqli_fetch_array($query)){
echo "<tr><td>".$extract['semundja']."</td></tr>"; 
}
echo "</table>";
}
 ?>