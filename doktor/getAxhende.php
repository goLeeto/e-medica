<?php 

include 'connect.inc.php';
if (!isset($_SESSION['sess_user'])) {
	session_start();
}
$doktori=$_SESSION['sess_user'];
if (isset($_POST['checked'])) {
	$checked=$_POST['checked'];
}
else
{
	$checked=0;
}
if ($checked==0)
{
$data = date('Y-m-d');
$query=mysql_query("SELECT * FROM notification WHERE doktori='$doktori' AND data='$data' ");

}
else
{
$query=mysql_query("SELECT * FROM notification WHERE doktori='$doktori'");	
}


echo "<ul id='axhenda'>";
while ($result=mysql_fetch_array($query)) {
$id=$result['pacient_username'];
$query2=mysql_query("SELECT Emri, Mbiemri FROM users WHERE username='$id'");
$result2=mysql_fetch_array($query2);
$timenow=substr($result['ora'], 0,5);
	echo "<li>".$result2['Emri']." ".$result2['Mbiemri']." ".$timenow." ".$result['titulli']." ".$result['data']. "</li>";
	echo "<br>";
}

echo "</ul>";


 ?>