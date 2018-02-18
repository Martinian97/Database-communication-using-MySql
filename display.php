<?php
 
    require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
    //echo '<p>Connected successfully</p>';
 
    $query="select * from authors";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
    //echo '<p>queried successfully</p>';
 
   $numrows=mysqli_num_rows($result);
   
   //printf("number of rows in table authors is %d", $numrows);
   //echo "<br>";
 
 
?>
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
   <h1>COMPLETE DATABASE</h1>
</header>
<br>
<table style="width:100%" border=1>
<h1> TABLE : AUTHORS </h1>
<tr>
<th bgcolor="#7FFFD4">NAME</th>
<th bgcolor="#7FFFD4">EMAIL</th>
<th bgcolor="#7FFFD4">COUNTRY</th>
</tr>
<?php
   for($j=0;$j<$numrows;++$j)
   {
       $rows=mysqli_fetch_row($result); 
   ?>
<tr>
<td>	<center><?php echo $rows[0]; ?> </center></td>
 <td>	<center><?php echo $rows[1]; ?> </center></td>
<td>	<center><?php echo $rows[2]; ?> </center></td>
<?php
   } 
?>
</tr>
</table>
</center> 
<?php

//TABLE 2
$query="select * from titles";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
    //echo '<p>queried successfully</p>';
 
   $numrows=mysqli_num_rows($result);
   
  // printf("number of rows in table titles is %d", $numrows);
   echo "<br>";
 
 
?>
<center>
<table style="width:100%" border=1>
<h1> TABLE : TITLES </h1>
<tr>
<th bgcolor="#7FFFD4">NAME</th>
<th bgcolor="#7FFFD4">TITLE</th>
<th bgcolor="#7FFFD4">YEAR</th>
</tr>
<?php
   for($j=0;$j<$numrows;++$j)
   {
       $rows=mysqli_fetch_row($result); 
   ?>
<tr>
<td>	<center><?php echo $rows[0]; ?> </center></td>
 <td>	<center><?php echo $rows[1]; ?> </center></td>
<td>	<center><?php echo $rows[2]; ?> </center></td>
<?php
   } 
?>
</tr>
</table>
<br>
<form action="index.php" method="get">
	<center><input type="submit" value="Click here to go back to MAIN PAGE!" >
</form>
</center> 
<?php


mysqli_close($conn); 
 
?>

