<?php
require_once("db.php");
$ALL = array();
try {
    $sql = "select * from tree_map order by date";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        // Push the entire associative array as an object
        array_push($ALL, $row);
    }
    header('Content-Type: application/json');
    echo json_encode($ALL);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>