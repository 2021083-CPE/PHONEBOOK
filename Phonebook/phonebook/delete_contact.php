<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM phonebook WHERE id = '$id'";
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
