<?php 
error_reporting(0);
include'connect.inc.php';

 
            $user = $_POST['username'];
            $pass = md5($_POST['pass']);
            $query = mysql_query("SELECT * FROM users WHERE username='$user' AND password='$pass'");

            $numrows=mysql_num_rows($query);
            echo $numrows;

 ?>