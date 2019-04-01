<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>

<?php
	
	// check whether the user has provided with the username and password
	if ($_POST['fuser'] && $_POST['fpass']) { 
	// dbconnect
		require('dbconnect.php');
		
		// process the user input and prepare the sql query
		$username = mysqli_real_escape_string($db,$_POST['fuser']);
		$sha1_pass = sha1($_POST['fpass']);
		$query = "select user_id, firstname from USERS  where username='".$username."' and password='".$sha1_pass."'";

		// query from the database and if matching information exists return relevant info.
		if ($result = mysqli_query($db, $query)) {
			$num_rows =  mysqli_num_rows($result);
			if ($num_rows > 0) {
				session_start();
				$row = mysqli_fetch_row($result);
				$_SESSION['user_id'] = $row[0];
				$_SESSION['firstname'] = $row[1];
			}
		}
		mysql_close($db);
	}
?>

<h1>Login Page</h1>

<?php

	// if a valid user information can be found in the database, show the home page
	if (isset($_SESSION['firstname'])) {
		// user logged in
		echo 'Welcome '.$_SESSION['firstname'].'<br>';
		echo '<a href="home.php">HomePage</a><br>';
	} else {
		// user is not logged in
		if (isset($_POST['firstname'])) {
			echo "Problem Logging In."."<br>";
		} else {
			echo "You are not logged in."."<br>";
		}
	
?>

Please log in.
<form method="post" action="login.php">
Username:&nbsp;<input type="text" name="fuser"><p>
Password:&nbsp;<input type="password" name="fpass"><p>
<input type="submit" value="Login">
</form>
<?php
}
?>

</body>
</html>
