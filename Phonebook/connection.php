<?php
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

    // Check if the username already exists
    $query = "SELECT * FROM user WHERE Username = :username";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // Username already exists, redirect to sign-up page with error message
        header("Location: signup.php?error=exists");
        exit;
    } else {
        // Insert the new user into the database
        $query = "INSERT INTO user (email, Password, Username) VALUES (:email, :password, :username)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        // Redirect to the index page
        header("Location: signup.php?signup=success");
        exit;
    }
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
