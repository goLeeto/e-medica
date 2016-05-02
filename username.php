<?php 

include'connect.inc.php';

 
            $user = $_POST['username'];
            $query = mysqli_query($conn,"SELECT * FROM users WHERE username='".$user."'");

            $numrows=mysqli_num_rows($query);
            echo $numrows;
 ?>