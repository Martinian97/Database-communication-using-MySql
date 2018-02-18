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
   <h1>SEARCH BY YEAR</h1>
</header>
<br>
<form action="year.php" method="GET">
	Year : <input type="text" name="year"> 
	<br>
	<input type="submit" value="Search">
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
 	
 	$numrows=0;
 	
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
 	$name=$_GET["year"];
 	
 	if($_GET["year"]!="") {	 	
    	$query="select * from titles where year= $name";
    	$result=mysqli_query($conn,$query); 

	
    	if (!$result) {
   	     die('<p>query failed: <p>' . mysqli_error());
    	}
  
 
   	$numrows=mysqli_num_rows($result);
 
	if($numrows==0) {
		  echo '<script type="text/javascript"> alert("NOT FOUND!!!") </script>';
		  echo '<script type="text/javascript"> location.href="year.php" </script>';
		}
	

	
	else {
	?>
	<center>
	<h2>Search Results:</h2>
	<table style="width:100%" border=1>
		<tr>
    	<th  bgcolor="#7FFFD4">Name</th>
    	<th  bgcolor="#7FFFD4">Title</th>
    	<th  bgcolor="#7FFFD4">Year</th>
	<?php 
		for ($j=0;$j<$numrows;++$j)
		{$rows=mysqli_fetch_row($result); 
		?>
  		</tr>
  		<tr>
    	<td><center><?php echo $rows[0]; ?></center></td>
		<td><center><?php echo $rows[1]; ?></center></td>
    	<td><center><?php echo $rows[2]; ?></center></td>
  		</tr>
  	<?php }
  	?>
	</table> 
	</center>
<?php
	}
}
mysqli_close($conn); 
?>
 
