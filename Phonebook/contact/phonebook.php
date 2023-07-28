<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ../index.php");
    exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: ../index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>User- Phonebook</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="x-icon" href="https://cdn-icons-png.flaticon.com/512/4542/4542391.png" sizes= 500px>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!--



-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/templatemo-chain-app-dev.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/main.css">
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/jquery.inputmask.js"></script>
  
<style>
  /* Custom CSS */
  .contact-card {
    border: 1px solid #ddd;
    border-radius: 0.25rem;
    padding: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px;
  }

  .contact-card .card-body {
    padding: 0;
  }

  .contact-card .card-title {
    padding: 10px;
    margin-bottom: 0;
    background-color: #0d4076;
    color: #fff;
  }

  .contact-card p {
    font-weight: 300;
    margin: 0;
    padding: 10px;
  }

  .contact-card .btn {
    margin: 10px;
  }

  /* Custom CSS for layout */
  .container {
    text-align: center;
    background-color: #262626;
    color: #fff;
    padding: 20px;
    border-radius: 10px;
  }

  .form-group {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 15px;
  }

  .form-group label {
    flex: 0 0 30%;
    margin-right: 10px;
    text-align: right;
  }

  .row {
    justify-content: center;
  }

  .col-md-6 {
    max-width: 500px;
  }

  h1 {
    font-weight: 900;
    font-size: revert;
    padding-top: 5%;
    margin-bottom: 31px;
  }

  h2 {
    margin-top: 30px;
  }

  #searchInput {
    margin-bottom: 10px;
  }

  #contactList {
    font-size: 79%;
    text-align: justify;
    list-style-type: none;
    padding: 0;
    margin-top: 20px;
  }

  #contactList .contact-card:last-child {
    margin-bottom: 0;
  }

  #noContactsFound {
    color: #fff;
  }

  @media (min-width: 768px) {
    .offset-md-2 {
      margin-left: auto;
      margin-right: auto;
    }
  }

  /* Night Mode */
  body {
    background-color: #000;
    color: #fff;
  }

.container {
    background-color: #00000000;
}

  .form-group label {
    color: #fff;
  }

  .contact-card {
    background-color: #1c1c1c;
  }

  .contact-card .card-title {
    background-color: #0d4076;
  }
</style>
</head>
<body>
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top" style="color:  #f8f9fa">
  <div class="container">
    <a class="navbar-brand" href="userAccount.php">Dimple Valencia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto" style="padding-left: 5%;text-align: justify;">
        <li class="nav-item active">
          <a class="nav-link" href="../userAccount.php" style="color: #f8f9fa;">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userAccount.php#about" style="color: #f8f9fa;">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userAccount.php#contact" style="color: #f8f9fa;">Contact Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="phonebook.php" style="color: #f8f9fa;">Phonebook</a>
        </li>
        <li class="nav-item">
        <form method="post" onsubmit="return confirmLogout();">
          <button class="nav-link" type="submit" name="logout" style="background-color: #dc3545; color: #f8f9fa;">Log out</button>
        </form>

        </li>
      </ul>
    </div>
  </div>
</nav>   
<br><br><br>



  <div class="container">
    <h1>Phonebook</h1>
    <div class="row">
      <div class="col-md-6">
        <form id="contactForm">
          <input type="hidden" id="contactId">
          <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
          </div>
          <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
          </div>
          <div class="form-group">
            <label for="middleName">Middle Name:</label>
            <input type="text" class="form-control" id="middleName" placeholder="Enter middle name">
          </div>
          <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address">
          </div>
          <div class="form-group">
            <label for="phoneNumber">Phone Number:</label>
            <input type="text" class="form-control" id="phoneNumber" placeholder="Enter phone number">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="notes">Notes:</label>
            <textarea class="form-control" id="notes" placeholder="Enter notes"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
    <h2>Contact List</h2>
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <input type="text" class="form-control" id="searchInput" placeholder="Search">
        <ul id="contactList"></ul>
        <p id="noContactsFound" style="display: none; color: #fff;">No contacts found.</p>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <script src="script.js"></script>


<br><br>




<div class=”footer-content”>
    <h3 style=" padding-top: 6%;
    color: black;
">ディンポル・ヴァレンシャ</h3>
</div>






<script>
function confirmLogout() {
  var confirmation = confirm("Are you sure you want to log out?");
  if (confirmation) {
    return true; // Allow form submission if user clicks "OK"
  } else {
    return false; // Prevent form submission if user clicks "Cancel"
  }
}
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<!-- Bootstrap dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include the jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Include the Slick Slider library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

