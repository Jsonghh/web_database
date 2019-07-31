
<?php
 	$h = "world.peace.org";
        $u = "world";
        $p = "peace";
        $dbname = "worldpeace";
        $db  = mysqli_connect($h, $u, $p, $dbname);
        if (mysqli_connect_errno()) {
                echo "Problem Connecting: " . mysqli_connect_error();
                exit();
        }
?>
