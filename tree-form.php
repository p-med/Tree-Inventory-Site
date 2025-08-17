<?php
require_once("php/db.php");
?>
<?php
$sql = "SELECT tree_id, common_name FROM tree_list ORDER BY common_name ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/tree-record.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>
    <title>Frame</title>
</head>

<body>
    <div class="grid-container">
        <div class="nav-container">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a class="active" href="tree-form.php">Tree Form</a></li>
                <li><a href="php/tree-map.php">Tree Map</a></li>
            </ul>
        </div>
        <div class="intro">
            <h1>Record your tree</h1>
            <p>Input the record of your tree here. Below an explanation of each field:</p>
            <ul>
                <li><b>Tree Species</b>: The tree name, you can input the common name or the scientific name.</li>
                <li><b>Date</b>: The day you are recording your tree.</li>
                <li><b>DBH</b>: The diameter in inches at the breast height. If you don't have the diameter, you can
                    choose to input the circumference.</li>
                <li><b>Height</b>: The estimated tree height in feets.</li>
                <li><b>Age</b>: The estimated tree age.</li>
                <li><b>Latitude and Longitude</b>: Click on the map to store the coordinates of your tree.</li>
            </ul>
        </div>
        <div class="carbon-result">

        </div>
        <div id="report">
            <form action="php/insert_tree.php" method="post" id="insertForm" enctype="multipart/form-data">
                <fieldset>
                    <label for="tree_id" class="leftLabel">Tree species: </label>
                    <select name="tree_id" id="tree_id" class="rightInput">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $value = $row['tree_id'];   // Value sent when option is selected
                                $display_text = $row['common_name']; // Text displayed in the dropdown
                                echo "<option value=\"{$value}\">{$display_text}</option>";
                            }
                        } else {
                            echo "<option value=\"\">No options available</option>";
                        }
                        ?>
                    </select>
                    <label for="age" class="leftLabel">Tree age:</label>
                    <input type="number" name="age" id="age" value="" class="rightInput"
                        placeholder="Enter the tree age">
                    <br>
                    <label for="rpDate" class="leftLabel">Report date:</label>
                    <input type="date" name="rpDate" id="rpDate" class="rightInput">
                    <br>
                    <label for="dbh" class="leftLabel">DBH:</label>
                    <input type="number" name="dbh" id="dbh" class="rightInput"
                        placeholder="Enter the tree diameter">
                    <br>
                    <label for="height" class="leftLabel">Height:</label>
                    <input type="number" name="height" id="height" class="rightInput"
                        placeholder="Enter the estimated tree height">
                    <br>
                    <label for="lat" class="leftLabel">Latitude:</label>
                    <input type="number" name="lat" id="lat" class="rightInput" step="any">
                    <br>
                    <label for="lon" class="leftLabel">Longitude:</label>
                    <input type="number" name="lon" id="lon" class="rightInput" step="any">
                    <br><br><br>
                    <input type="reset" id="cancel" value="Cancel">
                    <input type="submit" id="submit" value="Submit">
                </fieldset>
            </form>
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
    <script src="scripts/map.js"></script>
</body>

</html>