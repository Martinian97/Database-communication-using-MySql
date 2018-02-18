<?php
 
    require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
 
    $query="select * from authors";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
   // echo '<p>queried successfully</p>';
 
   $numrows=mysqli_num_rows($result);
  

//TABLE 1


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
   <h1>DELETE A RECORD</h1>
</header>
<br>
<form action="delete.php" method="get">
<table style="width:100%" border=1>
<h1> TABLE AUTHORS </h1>
<tr>
<th  bgcolor="#7FFFD4">NAME</th>
<th  bgcolor="#7FFFD4">EMAIL</th>
<th  bgcolor="#7FFFD4">COUNTRY</th>
<th  bgcolor="#7FFFD4">DELETE</th>
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
<td>    <center><input type="radio" name="record" value=<?php echo $j ?>></center>
<?php
   } 
?>
</tr>
</table>
<br>
<center><input type="submit" value="DELETE" >	
</form>

</center> 


<?php
 $option=$_GET["record"];
//echo $option;
if($option != "")
{
    require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
    $query="select * from authors";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
   // echo '<p>queried successfully</p>';
 
   $numrows=0;
   
   while($numrows<=$option){
       $rows=mysqli_fetch_row($result); 
	$numrows++;
}        
	$a='"'.$rows[0].'"';
	$b='"'.$rows[1].'"';
	$c='"'.$rows[2].'"';
//echo $a;
$query="delete from authors where name=$a and email=$b and country=$c limit 1";
 $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
  //  echo '<p>queried successfully</p>';
    echo "<script type='text/javascript'>alert('Deletion Successful');</script>";
    echo '<script type="text/javascript"> location.href = "delete.php" </script>'; 
 }
mysqli_close($conn); 

?>

<?php
 
    require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
   // echo '<script>alert(Connected successfully)</script>';
 
    $query="select * from titles";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
    //echo '<p>queried successfully</p>';
 
   $numrows=mysqli_num_rows($result);
  
 

//TABLE 2


?>
<center>
<form action="delete.php" method="get">
<table style="width:100%" border=1>
<h1> TABLE TITLES </h1>
<tr>
<th  bgcolor="#7FFFD4">NAME</th>
<th  bgcolor="#7FFFD4">TITLE</th>
<th  bgcolor="#7FFFD4">YEAR</th>
<th  bgcolor="#7FFFD4">DELETE</th>
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
<td>    <center><input type="radio" name="record2" value=<?php echo $j ?>></center>
<?php
   } 
?>
</tr>
</table>
<br>
<center><input type="submit" value="DELETE" >	
</form>
<br>
<form action="index.php" method="get">
	<center><input type="submit" value="Click here to go back to MAIN PAGE!" >
</form>
</center> 


<?php
 $option=$_GET["record2"];
//echo $option;
if($option != "")
{
    require_once 'login.php';
 
    $conn = mysqli_connect($db_hostname, $db_user, $db_password, $db_database);
 
    if (!$conn) {
        die('<p>Connection failed: <p>' . mysqli_connect_error());
    }
   // echo '<script>alert(Connected successfully)</script>';
 
 
    $query="select * from titles";
    $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
  //  echo '<p>queried successfully</p>';
 
   $numrows=0;
   
   while($numrows<=$option){
       $rows=mysqli_fetch_row($result); 
	$numrows++;
}        
	$a='"'.$rows[0].'"';
	$b='"'.$rows[1].'"';
	$c=$rows[2];
//echo $a;
$query="delete from titles where name=$a and title=$b and year=$c limit 1";
 $result=mysqli_query($conn,$query); 
 
    if (!$result) {
        die('<p>query failed: <p>' . mysqli_error());
    }
    //echo '<p>queried successfully</p>';
echo "<script type='text/javascript'>alert('Deletion Successful');</script>";
    echo '<script type="text/javascript"> location.href = "delete.php" </script>'; 
 }
mysqli_close($conn); 
 
?>
 

 
