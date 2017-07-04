<?php
/* Database connection start */

function dropdownlist(){
	$servername = "db";
	$username = "mysql";
	$password = "efeaf@@ss1!";
	$dbname = "db";
	$id = $_REQUEST['symbol'];
	$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

	//Checks if symbol record exists	
	if($result = mysqli_query($conn,"SELECT symbol FROM quotes")){
		
		echo '<select name = "symbol" id = "symbol" >';
	    /* fetch associative array */
	    while ($row = mysqli_fetch_row($result)) {
	        echo "<option value = '{$row[0]}'>{$row[0]}</option>";
	    }
	    echo "</select>";
	    /* free result set */
	    mysqli_free_result($result);

	}
	/* Database connection end */

	mysqli_close($conn);

}