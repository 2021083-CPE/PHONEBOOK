<?php
session_start(); // Start the session

$servername = "localhost";
$username = "id21003529_root";
$password = "Brahman_2023";
$database = "id21003529_localhost";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['username'];

    // Check if the credentials match
    $query = "SELECT * FROM user WHERE email = :email AND Password = :password AND Username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Login successful
        $_SESSION['username'] = $username; // Store the username in the session
        header("Location: userAccount.php");
        exit;
    } else {
        // Login failed
        header("Location: index.php?error=1");
        exit;
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
