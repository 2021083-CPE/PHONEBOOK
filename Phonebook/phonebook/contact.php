<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit;
}

// Validate the user input
function validateInput($name, $number, $email, $address, $notes) {
    if (empty($name)) {
        return "Please enter a name.";
    }

    if (empty($number)) {
        return "Please enter a number.";
    }

    if (!preg_match("/^[0-9]{10}$/", $number)) {
        return "Please enter a valid phone number.";
    }

    if (empty($email)) {
        return "Please enter an email address.";
    }

    if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$/", $email)) {
        return "Please enter a valid email address.";
    }

    if (empty($address)) {
        return "Please enter an address.";
    }

    return "";
}

// Search for contacts by name
function searchContacts($name) {
    $phonebook = [];
    $sql = "SELECT * FROM phonebook WHERE name LIKE '%$name%'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $phonebook[] = $row;
        }
    }

    return $phonebook;
}


// Add a contact to the database
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];

    $error = validateInput($name, $number, $email, $address, $notes);
    if ($error) {
        echo $error;
    } else {
        $sql = "INSERT INTO phonebook (name, number, email, address, notes) VALUES ('$name', '$number', '$email', '$address', '$notes')";
        mysqli_query($con, $sql);
        echo "Contact added successfully.";
    }
}

// Search for contacts
if (isset($_POST['search'])) {
    $name = $_POST['search'];
    $phonebook = searchContacts($name);

    if (count($phonebook) > 0) {
        foreach ($phonebook as $contact) {
            echo $contact['name'] . " - " . $contact['number'] . "<br>";
        }
    } else {
        echo "No contacts found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Contact List</title>
</head>
<body>

<h1>Contact List</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Number</th>
      <th>Email</th>
      <th>Address</th>
      <th>Notes</th>
    </tr>
  </thead>
  <tbody>
    <?php
foreach ($phonebook as $contact) {
    echo '<tr>';
    echo '<td>' . $contact['name'] . '</td>';
    echo '<td>' . $contact['number'] . '</td>';
    echo '<td>' . $contact['email'] . '</td>';
    echo '<td>' . $contact['address'] . '</td>';
    echo '<td>' . $contact['notes'] . '</td>';
    echo '</tr>';
}

    ?>
  </tbody>
</table>

</body>
</html>

