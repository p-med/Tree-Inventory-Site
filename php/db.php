<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "tree_inventory";

$conn = mysqli_connect($hostname, $username, $password, $dbname);

if (!$conn) {
    die("Database connection error " . mysqli_connect_error());
}

?>
