<?php 
include'connect.inc.php';
session_start();
$user = $_SESSION['sess_user'];
$query1 = mysqli_query($conn,"UPDATE users SET online=0 WHERE username='".$user."'");
unset($_SESSION['sess_user']);
session_destroy();
header("Location: index.php");

 ?>