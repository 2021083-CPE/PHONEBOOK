<?php
session_start(); // Start the session
$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit;
}


// Retrieve the contact data from the request
$contactData = json_decode(file_get_contents('php://input'), true);

// Connect to the database
$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

$current_username = $_SESSION['username'];
$conn = mysqli_connect('localhost', 'id21003529_root', 'Brahman_2023', 'id21003529_localhost');

// Prepare the SQL statement based on whether it's an insert or update
if (empty($contactData['id'])) {
  $sql = "INSERT INTO contacts (id, first_name, last_name, middle_name, address, phone_number, email, notes, owner) VALUES (NULL, '" . mysqli_real_escape_string($conn, $contactData['firstName']) . "', '" . mysqli_real_escape_string($conn, $contactData['lastName']) . "', '" . mysqli_real_escape_string($conn, $contactData['middleName']) . "', '" . mysqli_real_escape_string($conn, $contactData['address']) . "', '" . mysqli_real_escape_string($conn, $contactData['phoneNumber']) . "', '" . mysqli_real_escape_string($conn, $contactData['email']) . "', '" . mysqli_real_escape_string($conn, $contactData['notes']) . "', '$current_username')";
        $conn->query($sql);


} if (!empty($contactData['id'])) {
  $sql = "UPDATE contacts SET
            first_name = '" . mysqli_real_escape_string($conn, $contactData['firstName']) . "',
            last_name = '" . mysqli_real_escape_string($conn, $contactData['lastName']) . "',
            middle_name = '" . mysqli_real_escape_string($conn, $contactData['middleName']) . "',
            address = '" . mysqli_real_escape_string($conn, $contactData['address']) . "',
            phone_number = '" . mysqli_real_escape_string($conn, $contactData['phoneNumber']) . "',
            email = '" . mysqli_real_escape_string($conn, $contactData['email']) . "',
            notes = '" . mysqli_real_escape_string($conn, $contactData['notes']) . "'
          WHERE id = " . (int)$contactData['id'];
          // Execute the SQL statement
if (mysqli_query($conn, $sql)) {
  echo 'Contact saved successfully';
} else {
  echo 'Error: ' . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
}


?>