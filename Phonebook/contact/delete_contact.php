<?php
// Retrieve the contact ID from the request
$contactId = $_GET['id'];

// Connect to the database
$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

// Check connection
if (mysqli_connect_errno()) {
  die('Database connection failed: ' . mysqli_connect_error());
}

// Delete the contact with the specified ID
$sql = "DELETE FROM contacts WHERE id = " . (int)$contactId;
if (mysqli_query($conn, $sql)) {
  echo 'Contact deleted successfully';
} else {
  echo 'Error: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
