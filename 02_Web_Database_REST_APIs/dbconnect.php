
<?php
 	$h = "pearl.ils.unc.edu";
        $u = "webdb_jhe18";
        $p = "jinls760";
        $dbname = "webdb_jhe18";
        $db  = mysqli_connect($h, $u, $p, $dbname);
        if (mysqli_connect_errno()) {
                echo "Problem Connecting: " . mysqli_connect_error();
                exit();
        }
?>
