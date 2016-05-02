<?php 

include'connect.inc.php';

 
            $user = mysqli_real_escape_string($conn,$_POST['username']);
            $query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."'");

            $numrows=mysqli_num_rows($query);
            echo $numrows;
 ?>