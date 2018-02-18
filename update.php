<html>
<body>
<center>
<style>
header{
    padding: 5em;
    color: black;
    background-color: #ADD8E6;
    clear: left;
    text-align: center;
}
</style>
<body bgcolor="IndianRed">
<header>
   <h1>UPDATE A RECORD</h1>
</header>
<br>
<form action="update.php" method="GET">
	 <br>
	Book Title: <input type="text" name="n1"> 
	<br>
	Year: <input type="text" name="n2"> 
	<br>
	<input type="submit" value="Update">
	<br>
</form>
<form action="index.php" method="get">
	<center><input type="submit" value="Click here to go back to MAIN PAGE!" >
</form>
</center>
</body>
</html>

<?php
   require_once 'login.php';
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);

  $v1='"'.$_GET["n1"].'"';
  $v2=$_GET["n2"];
  $query="update titles set year=$v2 where title=$v1";
  $result= mysqli_query($conn,$query); 
  if (!$result) {
        die('<p>insertion failed: <p>' . mysqli_error());
    }
    echo "<script type='text/javascript'>alert('Update Successful');</script>";
mysqli_close($conn); 
?>
