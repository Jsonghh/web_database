<html>

<head>
<link href="style.css" type="text/css" rel="stylesheet"/>
</head>



<script
src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>

<script>
	$(document).ready(function() {
		$("#insch").keyup(function(){
			var source = $(this).val();
			$.get("keyword-suggestions.php?input="+source, function(data, status) {
				$('#C').html(data);
			});
				
		});

		$("#A div").mouseover(function(){
			// retrieve the id of the div
			var videoid = $(this).attr('id');
			$.post('result-details.php',
				{ input:videoid},
				function(data, status) {
					$('#D').html(data);
				}
			);
		});

		$("#A div").mouseleave(function(){
			$("#D").html('');
		});
	});
		
</script>



<body>

<div id="title">
<h2>Open Video</h2>
</div>

<div id='container'>
<div id='B'>
<form action='results.php' method='get'>
<input id='insch' type='text' name='searchword'><br>
<input id='inbtn' type='submit' value='Search'>
</form>
</div>



<div id='A'>
<?php
	if (isset($_GET['searchword'])) {

		//connect the database
		require 'dbconnect.php';

		//data sanitization
		$searchword =  mysqli_real_escape_string($db, $_GET['searchword']);
		
		//show the data from database
		echo 'Showing results for: '.$searchword;
		$query = 'select videoid, title, creationyear, description from p4records where match(title, description, keywords) against ("'.$searchword.'")';
		if ($result = mysqli_query($db, $query)) {
			while ($row = mysqli_fetch_assoc($result)) {
				// record the video id for a data entry
				$videoid = $row['videoid'];
				
				// build a displaying div for a video 
				echo '<div id='.$videoid.'>';
				//show the title and creationg year
				echo '<h3>'.$row['title'].' ('.$row['creationyear'].')</h3>';
				
				// process the description string if is longer than 200 character
				$desLen =  mb_strlen($row['description']);
				if ($desLen > 200) {
					$row['description'] = mb_substr($row['description'], 0, 200, "UTF8")."...";
				}
				echo $row['description'];
				echo '</div>';
			}
			
		}	 
		mysql_close($db);
	}
?>

</div>


<div id='C'>

</div>

<div id='D'>

</div>
</div>
</body>
</html>

















