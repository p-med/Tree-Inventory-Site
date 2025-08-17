<?php
require_once("db.php");
$ALL = array();
try {
    $sql = "select * from tree_map order by date";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result)) {
        array_push($ALL, $row["common_name"]);
        array_push($ALL, $row["date"]);
        array_push($ALL, $row["dbh"]);
        array_push($ALL, $row["height"]);
        array_push($ALL, $row["density"]);
        array_push($ALL, $row["type"]);
        array_push($ALL, $row["carbon_storage"]);
        array_push($ALL, $row["lat"]);
        array_push($ALL, $row["lon"]);
    }
    $ALLj = json_encode($ALL);
    echo $ALLj;
} catch (Exception $e) {
    echo $e->getMessage();
}
