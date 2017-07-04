<?php
/* Database connection start */
$servername = "db";
$username = "mysql";
$password = "efeaf@@ss1!";
$dbname = "db";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* Database connection end */


$id = $_REQUEST['symbol'];

// Delete record from qwatch if requested. 

$sql = "DELETE FROM qwatch ";
$sql.=" WHERE symbol = '".$id."'";
$query=mysqli_query($conn, $sql) or die("failed");
    
mysqli_close($conn);
?>