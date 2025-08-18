<?php
require_once("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/tree-map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <title>Tree map</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav-container">
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="../tree-form.php">Tree Form</a></li>
                <li><a class="active" href="tree-map.php">Tree Map</a></li>
            </ul>
        </div>
        <div class="desc">
            <h1>Tree inventory map</h1>
            <?php
            try {
                $result = mysqli_query($conn, "SELECT SUM(carbon_storage) FROM tree_records;");
                while ($row = mysqli_fetch_array($result)) {
                    $total = number_format($row[0], 2, '.', ',');
                    echo "<h3> Total carbon captured recorded: $total kg </h3>";
                }
            } catch (Exception $e) {
            }
            ?>
        </div>
        <div id="map"></div>
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
    <script src="../scripts/tree-map.js"></script>
</body>

</html>