<?php

session_start(); // Start the session
$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit;
}

// Check connection
if (mysqli_connect_errno()) {
  die('Database connection failed: ' . mysqli_connect_error());
  exit();
}

$current_username = $_SESSION['username'];

$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

        
// Fetch all contacts
$sql = "SELECT * FROM contacts WHERE owner = '$current_username'";
$result = mysqli_query($conn, $sql);

$contacts = array();
while ($row = mysqli_fetch_assoc($result)) {
  $contacts[] = $row;
}

// Convert the contacts array to JSON and send the response
header('Content-Type: application/json');
echo json_encode($contacts);

// Close the database connection
mysqli_close($conn);
?>
