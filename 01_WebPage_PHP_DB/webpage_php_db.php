
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="utf-8" />
<title> p2.php </title>
</head>


<body>
<?php
     	echo "<h2>P2 Records</h2>";

        require "/dbconnect.php";
	echo "<table>";
        echo "<tr>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=authors'>Author(s)</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=title'>Title</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=publication'>Publication</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=year'>Year</a></th>";

        if (!isset($_GET['sortby'])) {
                $_GET['sortby'] = "itemnum";
        }

	$query = "select * from p2records"." order by ".$_GET['sortby'];
        if ($result = $mysqli->query($query)) {
                while($row = $result->fetch_assoc()) {

                        echo "<tr>";
                        echo "<td>".$row['authors']."</td>";
                        echo "<td><a href='".$row['url']."'>".$row['title']."</a></td>";
                        echo "<td>".$row['publication']."</td>";
                        echo "<td>".$row['year']."</td>";
                        echo "</tr>";
                }
        }
	echo "</table>";

?>

</body>
</html>


