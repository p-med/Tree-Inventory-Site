<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Frame</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav-container">
            <ul>
                <li><a class="active" href="index.html">Home</a></li>
                <li><a href="../tree-form.php">Tree Form</a></li>
                <li><a href="../tree-map.php">Tree Map</a></li>
            </ul>
        </div>
        <div class="content">
            <?php

            $tree_id = $_POST['tree_id'];
            $age = $_POST['age'];
            $date = $_POST['rpDate'];
            $dbh = $_POST['dbh'];
            $height = $_POST['height'];
            $lat = $_POST['lat'];
            $lon = $_POST['lon'];

            // Calculate the carbon storage

            $query = "SELECT density FROM tree_list WHERE tree_id = '00012A'";
            $result = mysqli_query(mysql: $conn, query: $query);

            // Fetch the result row as an associative array
            $row = mysqli_fetch_assoc($result);

            // Access the 'density' value by its column name
            $density = $row['density'];

            $carbon = (pi() * ($dbh ** 2) * $density * 0.5) / 4;

            mysqli_free_result($result);

            // Check if $uploadOK is set to 0 by an error

            $sql = "insert tree_records (tree_id, date, dbh, height, lat, lon, age, carbon_storage) values
            ('$tree_id','$date','$dbh', '$height', '$lat', '$lon', '$age', '$carbon')";

            $result = mysqli_query(mysql: $conn, query: $sql);
            if ($result == 1) {
                echo "<h4>Succeded to insert a fig tree record</h4>";
            } else {
                echo "<h4>Failed to insert a fig tree record</h4>";
            }
            ?>
        </div>
        <div class="footer">
            <p>Paulo Medina</p>
            <a href="mailto:pcmedina.avalos@gmail.com" target="_blank"><img
                    src="https://img.icons8.com/?size=100&id=Y2GfpkgYNp42&format=png&color=ffffff" alt=""
                    srcset="" /></a>
            <a href="https://www.linkedin.com/in/paulo-medina/" target="_blank"><img
                    src="https://img.icons8.com/?size=100&id=60444&format=png&color=ffffff" alt="" /></a>
            <a href="https://github.com/p-med" target="_blank"><img
                    src="https://img.icons8.com/?size=100&id=12599&format=png&color=ffffff" alt="" /></a>
        </div>
    </div>
</body>

</html>