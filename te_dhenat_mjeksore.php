<?php 
include'connect.inc.php';
if(isset($_SESSION["sess_user"])){
$user = $_SESSION["sess_user"];
$query = mysql_query("SELECT * FROM diagnostifikim WHERE personi='".$user."'");
if($query === FALSE) { 
    die(mysql_error()); }
    echo "<table id='mjekesore_table'>";
while($extract = mysql_fetch_array($query)){
echo "<tr><td>".$extract['semundja']."</td></tr>"; 
}
echo "</table>";
}
 ?>