<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" type="text/css" href="style.css">  
	<title>project3</title>
</head>
<body>


<!--  greeting div -->
<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
	// if logged in
		echo "<div class='greeting'>";
		echo "<h2>Hello, ".$_SESSION['firstname']."</h2>";
		echo "<a href='logout.php'>(logout)</a><br>";
	
		// the number of rows represents for the number of followings followers
		$query_following = "select follows_id  from FOLLOWS where user_id='".$_SESSION['user_id']."'";
		$query_follower = "select user_id  from FOLLOWS where follows_id='".$_SESSION['user_id']."'";
	
		$num_following = 0;
		$num_follower = 0;

		require('dbconnect.php');
		// get the number of followings and followers
		if ($result = mysqli_query($db, $query_following)) {
                	$num_following =  mysqli_num_rows($result);
        	}

		if ($result = mysqli_query($db, $query_follower)) {
         		$$num_follower = mysqli_num_rows($result);
        	}
	
		echo "<p>Following ".$num_following." / Followed by ".$num_follower."</p><br>";
		echo "</div><br>";
		
	} else {
 		echo "<div class='greeting'>";
		echo "<p>You are not logged in, please log in first.</p>";
	        echo "<a href='login.php'>Login</a> <br>";
		echo "</div>";
	}
?>

<!-- post div -->
<!-- use the POST method to send the text of the cheep to post_cheep.php. -->
<div class='post'>
<form action="post_cheep.php" method="post">
<input type="text" class="inputpost" name="cheep_text" maxlength="141" placeholder="Type a new cheep here">
<input type="submit" class="postbtn" value="POST">
</form>
<br>
<br>
<br>
</div>





<div class='container'>
<!-- searching filter div -->
<div class="fil_cheep">
<h2>Search cheeps:</h2><br>
<form action="home.php" method="get">
<p>Matching text:</p>
<input type="text" name="ma_text">
<br>
<br>
<input type="radio" class="inputradio" name="ma_user" value="all">        All users<br>
<input type="radio" class="inputradio" name="ma_user" value="following">        Only users I follow<br>
<br>
<input type="submit" class="searchbtn" value="SEARCH">

</form>
</div>






<!-- searching result div -->
<?php
	if (isset($_SESSION['user_id'])){
		$query - '';	
		if (!isset($_GET['ma_text']) && !isset($_GET['ma_user'])) {

		     // compile query when neither filter is set
			$query = 'select USERS.firstname, USERS.lastname, USERS.username, CHEEPS.created_date, CHEEPS.cheep_text '.
				'from (CHEEPS join FOLLOWS on CHEEPS.user_id = FOLLOWS.follows_id) '.
				'join USERS on CHEEPS.user_id = USERS.user_id '.
				'where FOLLOWS.user_id = '.$_SESSION["user_id"].' order by created_date desc limit 10'; 
		
		} else if (isset($_GET['ma_text']) && !isset($_GET['ma_user'])) {
		
			// compile query when the matching text is set but matching group is not set
			$ma_text = mysqli_real_escape_string($db, $_GET['ma_text']);
			
                        $query = 'select USERS.firstname, USERS.lastname, USERS.username, CHEEPS.created_date, CHEEPS.cheep_text '.
                                'from (CHEEPS join FOLLOWS on CHEEPS.user_id = FOLLOWS.follows_id) '.
                                'join USERS on CHEEPS.user_id = USERS.user_id '.
                                'where FOLLOWS.user_id = '.$_SESSION["user_id"].' and CHEEPS.cheep_text like "%'.$ma_text.'%" '.
				'order by created_date desc limit 10';
		
		} else if ($_GET['ma_user'] == 'all') {
		
			// compile query when the matching text is set and the matching group is all users 
			$ma_text = mysqli_real_escape_string($db, $_GET['ma_text']);
			$query = 'select USERS.firstname, USERS.lastname, USERS.username, CHEEPS.created_date, CHEEPS.cheep_text '. 
                                'from CHEEPS join USERS on CHEEPS.user_id = USERS.user_id '. 
                                'where CHEEPS.cheep_text like "%'.$ma_text.'%" order by created_date desc limit 10';
		
		} else {
			// compile query when the matching test is set and the matching group is following users
			$ma_text = mysqli_real_escape_string($db, $_GET['ma_text']);

                        $query = 'select USERS.firstname, USERS.lastname, USERS.username, CHEEPS.created_date, CHEEPS.cheep_text '.
                                'from (CHEEPS join FOLLOWS on CHEEPS.user_id = FOLLOWS.follows_id) '.
                                'join USERS on CHEEPS.user_id = USERS.user_id '.
                                'where FOLLOWS.user_id = '.$_SESSION["user_id"].' and CHEEPS.cheep_text like "%'.$ma_text.'%" '.
                                'order by created_date desc limit 10';
		
		}
	}
		
		// build the div for cheeps searching result
		echo "<div class='seres'>";
		//  query from the database
		echo "<h2>Recent cheeps:</h2><br>";
		echo "<div class='secontent'>";
		if ($result = mysqli_query($db, $query)) {
                        while ($row = mysqli_fetch_assoc($result)){
                        	echo "<p class='commentname'>".$row['firstname']." ".$row['lastname']."</p>".
				     "<p class='commentsuffix'> @".$row['username']." - ".$row['created_date']."</p>".
			     	     "<p class='commentcheeptext'>".$row['cheep_text']."</p><br>";
			}
                }
		mysqli_close($db);
		echo "</div></div>";

?>
</div>
</body>
</html>




	

