<?php
/* Database connection start */
$servername = "db";
$username = "mysql";
$password = "efeaf@@ss1!";
$dbname = "db";
$id = $_REQUEST['symbol'];
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

//Checks if symbol record exists

$precheck = mysqli_query($conn,"SELECT * FROM quotes WHERE symbol = '".$id."'");

if($precheck->num_rows == 0){
	echo 1;
}
else{

	//Copy record from quotes to qwatch
	
	$sql = "INSERT INTO qwatch
	SELECT q.*
	FROM quotes q";
	$sql.=" WHERE symbol = '".$id."'";
	$querycheck=mysqli_query($conn, $sql) or die("2");
}

/* Database connection end */

mysqli_close($conn);

function debug_to_console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".print_r($data)."');</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."');</script>");
	}
}