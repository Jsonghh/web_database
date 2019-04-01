<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		// connect to the database
		require('dbconnect.php');
		
		$fcheep = mysqli_real_escape_string($db, $_POST['cheep_text']);
		// compile the query command to insert values
		$sql = "INSERT INTO CHEEPS (cheep_id, cheep_text, created_date, user_id)".
		       " VALUES (NULL, '".$fcheep."', CURRENT_TIME(), ".$_SESSION['user_id'].")";
		
		// Attempt insert query execution
		if(mysqli_query($db, $sql)){
			echo "Records inserted successfully.";
			echo "<a href='home.php'>Home Page</a>";
		} else {
    			echo "ERROR: Could not able to execute query. " . mysqli_error($db);
			echo "<a href='home.php'>Home Page</a>";
		}
	}
 
	// Close connection
	mysqli_close($db);
	
?>
