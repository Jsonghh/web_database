<?php
$h = 'foofoo.edu';
$u = 'webdb2';
$p = 'webdb2';
$dbname = 'webdb2';
$db = mysqli_connect($h,$u,$p,$dbname);
if (mysqli_connect_errno()) {
echo "Connect failed" . mysqli_connect_error();
exit();
}
?>