<?php 
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "tree_inventory";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    die("Database connection error " . mysqli_connect_error());
}

?>
