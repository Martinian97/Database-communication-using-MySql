<html>
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
   <h1>ADD A RECORD</h1>
</header>
<br>
<form action="insert.php" method="get">
	
	<br>
	<center>Name:</center> <center><input type="text" name="value1"></center> 
	<br>
	<center>Email/Title:</center> <center><input type="text" name="value2"></center>
	<br>
	<center>Country/Year:</center> <center><input type="text" name="value3"></center>
	<br>
	<center>INSERT INTO<input type="radio" name="table" value="authors">AUTHORS</center>
	<br>
	<center>INSERT INTO<input type="radio" name="table" value="titles">TITLES</center>
	<br>
	<center><input type="submit" value="GO AHEAD!" >
</form>
<form action="index.php" method="get">
	<center><input type="submit" value="Click here to go back to MAIN PAGE!" >
</form>
</body>
</html>

<?php
$table=$_GET["table"];
$a='"'.$_GET["value1"].'"';
$b='"'.$_GET["value2"].'"';
if($table=="titles")
	$c=$_GET["value3"];
else
	$c='"'.$_GET["value3"].'"';

$query = "insert into $table values ($a,$b,$c)";
require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
    //echo '<p>Connected successfully</p>';
 $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>insertion failed: <p>' . mysqli_error());
    }
    echo "<script type='text/javascript'>alert('Insertion Successful');</script>";
 
?> 
