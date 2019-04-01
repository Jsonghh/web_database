
<?php
 	$h = "pearledu";
        $u = "webdb_";
        $p = "webdb_";
        $dbname = "webdb_jhe18";
        $db  = mysqli_connect($h, $u, $p, $dbname);
        if (mysqli_connect_errno()) {
                echo "Problem Connecting: " . mysqli_connect_error();
                exit();
        }
?>
