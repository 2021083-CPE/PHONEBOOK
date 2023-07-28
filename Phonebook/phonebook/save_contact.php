<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO phonebook (name, number, email, address, notes) VALUES ('$name', '$number', '$email', '$address', '$notes')";
    if (mysqli_query($con, $sql)) {
        $response = array('success' => true);
    } else {
        $response = array('success' => false, 'error' => mysqli_error($con));
    }

    echo json_encode($response);
} else {
    echo 'Invalid request';
}
?>
