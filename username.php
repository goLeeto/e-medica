<?php 

include'connect.inc.php';

 
            $user = $_POST['username'];
            $query = mysql_query("SELECT * FROM users WHERE username='".$user."'");

            $numrows=mysql_num_rows($query);
            echo $numrows;
 ?>