<?php
    require_once 'login.php';
 

    $conn = mysqli_connect($db_hostname, $db_user, $db_password);
 
    if (!$conn) {
        die('<script>alert(Connection Failed!)</script>'. mysqli_connect_error());
    }
   echo "<script type='text/javascript'>alert('Connection Successful');</script>";
   echo '<script type="text/javascript"> location.href = "index.php" </script>'; 
   mysqli_close($conn); 
 
?>

