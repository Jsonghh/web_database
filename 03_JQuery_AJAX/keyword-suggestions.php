<?php
	echo '<h3>Suggestions:</h3>';
	// read file
	$file_handler = fopen('p4-keywordphrases.txt', 'r');
	
	// construct the phrases list
	$phrases = [];
	while (!feof($file_handler)) {  
        	$phrases[]  = fgets($file_handler);  
        }
	
	// find the phrases that start with the input string
	$input = $_GET['input'];
	$results = [];
 	foreach ($phrases as $value) {
		
		// 10 phrases at maximum
		if (sizeof($results) == 10) {
			break;
		}

		// put the  phrases starting with the input string into results list
        	if (substr_compare($value, $input, 0, strlen($input)) === 0) {
			$results[] = $value;
		}
	}

	// echo elements in the results list
	$sgnum = 0;
	foreach ($results as $value) {
		$sgnum = $sgnum + 1;
		echo $sgnum.'. '.$value;
		echo '<br>';		
	}
?>


