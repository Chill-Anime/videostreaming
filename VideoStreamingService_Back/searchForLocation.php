<?php
require_once 'db_credentials.php';

// Retrieve the input using a GET parameter
$animeName = $_GET['animeName'];

// Sanitize the input
$animeName = mysqli_real_escape_string($conn, $animeName);

// Query the database
$query = "SELECT * FROM anime_shows WHERE name = '$animeName'";
$result = mysqli_query($conn, $query);

// Prepare the response
$response = array();

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $response[] = $row;
    }
}

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);
?>
