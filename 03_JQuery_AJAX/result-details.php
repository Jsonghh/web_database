<?php	
	// connect the database
	require 'dbconnect.php';

	// receive the videoid via post method
	$videoid = $_POST['input'];

	// construct the query to retrieve required element
	$query = 'select title, genre, keywords, duration, color, sound, sponsorname from p4records where videoid="'.$videoid.'"';
	
	// database query and echo html blocks
	if ($result = mysqli_query($db, $query)) {
                        while ($row = mysqli_fetch_assoc($result)) {

                                //show the title and creationg year
                                echo '<h4>'.$row['title'].'</h4>';
				echo '<h4 style="display:inline;">Genre: </h4>'.$row['genre'].'<br>';
				echo '<h4 style="display:inline;">Keywords: </h4>'.$row['keywords'].'<br>';
				echo '<h4 style="display:inline;">Duration: </h4>'.$row['duration'].'<br>';
				echo '<h4 style="display:inline;">Color: </h4>'.$row['color'].'<br>';
				echo '<h4 style="display:inline;">Sound: </h4>'.$row['sound'].'<br>';
				echo '<h4 style="display:inline;">Sponsor: </h4>'.$row['sponsorname'].'<br>';
                        }
         }
	
	mysql_close($db);

?>
