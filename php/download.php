<?php
// Include your database connection file
require_once("db.php");

// Set the HTTP headers for file download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="tree_data.csv"');

// Create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// Set the columns for the CSV header
$header = array('Species', 'Date', 'DBH', 'Height', 'Wood_density', 'wood_type', 'Carbon_captured', 'Latitude', 'Longitude');
fputcsv($output, $header);

try {
    // Select all the data from your table
    $sql = "SELECT * FROM tree_map ORDER BY date";
    $result = mysqli_query($conn, $sql);

    // Loop through the query results and write each row to the CSV
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);
    }
} catch (Exception $e) {
    // You can handle errors here, for example, by logging the error or displaying a message
    // For a download script, it's best to handle errors silently or log them.
} finally {
    // Close the database connection and the file pointer
    mysqli_close($conn);
    fclose($output);
}
?>