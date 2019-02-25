
<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<meta charset="utf-8" />
<title> p2.php </title>
</head>


<body>
<?php
     	session_start();


             if (!isset($_GET['sortby']) && !isset($_SESSION['sortby'])) {
                     $_SESSION['sortby'] = "itemnum";
             } else if (isset($_GET['sortby'])) {
                     $_SESSION['sortby'] = $_GET['sortby'];
             }
     
     
             if (!isset($_GET['page']) && !isset($_SESSION['page'])) {
                     $_SESSION['page'] = "1";
             } else if (isset($_GET['page'])) {
                     $_SESSION['page'] = $_GET['page'];
             }
     
     
             echo "<h2>P2 Records （sort by ".$_SESSION['sortby'].")</h2>";

        require "/dbconnect.php";
        echo "<table>";
        echo "<tr>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=authors'>Author(s)</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=title'>Title</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=publication'>Publication</a></th>";
        echo "<th><a href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?sortby=year'>Year</a></th>";


        $offset = 25 * ($_SESSION['page'] - 1);

        $query = "select * from p2records"." order by ".$_SESSION['sortby']." limit ".$offset.", 25";
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


        echo "<div class='pagelink'>";
        for ($page = 1; $page <= 9; $page++) {
                if ($page == $_SESSION['page']) {
                        echo "<a class='pagelink' href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?page=$page'>[$page]</a>";
                } else {
                        echo "<a class='pagelink' href='https://opal.ils.unc.edu/~jhe18/project2/showdb_mysqli_oo.php?page=$page'>$page</a>";
                }
        }
	echo "</div>";
?>

</body>
</html>


