<?php
$lines = file('data.txt');

$commend = array();
$improve = array();
foreach ($lines as $line) {
  $line = trim($line);

  // split line into attributes list
  $attributes = explode(',', $line);

  // get names
  $name = $attributes[1];

  // get dates in target format
  $date_ori = $attributes[2];
  $date_target = date("F j, Y", strtotime($date_ori));

  // store an individual's information into an array - $staff
  $staff = array();w
  $staff[0] = $name;
  $staff[1] = $date_target;

  // get earnings and ratings
  $earning = $attributes[4];
  $rating = $attributes[5];

  // allocate the staff's information: commend or improve
  if ($earning < 50000 && $rating == "excellent") {
    $commend[$staff[0]] = $staff;
  }
    
  
  if ($earning > 60000 && $rating == "poor") {
    $improve[$staff[0]] = $staff;
  }
}

ksort($commend);
ksort($improve);

// output
echo "Improve performance:\n";
foreach($improve as $staff) {
  echo $staff[0], "\t", "$staff[1]", "\n";
}
echo "-----------------------\n";
echo "Commend performance:\n";
foreach($commend as $staff) {
  echo $staff[0], "\t", "$staff[1]", "\n";
}

?>



