<?php 
session_start();
include "connect.inc.php";
$user = $_SESSION['sess_user'];
$doktori = $_SESSION['doktori'];
$query1 = mysqli_query($conn,"SELECT online FROM users WHERE username='".$doktori."'");
$query2 = mysqli_query($conn,"SELECT username FROM users WHERE username='".$user."'");
$extract = mysqli_fetch_array($query1);
$extract1=mysqli_fetch_array($query2);
$online=$extract['online'];
$username=$extract1['username'];

$result = [$online,$username];
echo json_encode($result);
 ?>