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
<html lang="en">
<head>
   <title>Phonebook</title>
  <meta charset="utf-8">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="x-icon" href="https://img.icons8.com/?size=512&id=54086&format=png" sizes= 500px>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="js/index.js"></script>
    <script src="js/jquery.inputmask.js"></script>


    <style>

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table td, table th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    form {
      margin-bottom: 20px;
    }

    input[type="text"], textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }

    .search-box {
      margin-top: 10px;
    }

.transition-effect {
  opacity: 0;
  transform: translateY(20px);
  transition: opacity 0.5s ease, transform 0.5s ease;
}

.transition-effect.animate {
  opacity: 1;
  transform: translateY(0);
}

  </style>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-danger fixed-top">
  <div class="container">
    <a class="navbar-brand" href="userAccount.php">Dimple Valencia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="../userAccount.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userAccount.php#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../userAccount.php#contact">Contact Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="phonebook.php">PHONEBOOK</a>
        </li>
        <li class="nav-item">
        <form method="post" onsubmit="return confirmLogout();">
          <button class="nav-link" type="submit" name="logout" style="background-color: #dc3545;">Log out</button>
        </form>

        </li>
      </ul>
    </div>
  </div>
</nav>

<br><br><br>
              <div class="col-6 bg-light" style="text-align: center;display: contents;">
                <h4 class="display-12">
                  <b><i>Phone Book Application System</i></b>
                </h4><br>
              </div>

  <form id="addForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="number">Number:</label>
    <input type="text" id="number" name="number" required>

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required>

    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required>

    <label for="notes">Notes:</label>
    <textarea id="notes" name="notes"></textarea>

    <button type="submit">Add Contact</button>
  </form>

  <div class="search-box">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" placeholder="Search by name...">
  </div>

  <table id="phonebookTable">
    <tr>
      <th>Name</th>
      <th>Number</th>
      <th>Email</th>
      <th>Address</th>
      <th>Notes</th>
      <th>Action</th>
    </tr>
  </table>

<script>
  const phonebookTable = document.getElementById('phonebookTable');
  const addForm = document.getElementById('addForm');
  const searchInput = document.getElementById('search');

  // Function to fetch contacts from the database and populate the phonebook table
  function fetchContacts() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch_contacts.php', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const contacts = JSON.parse(xhr.responseText);
          populatePhonebook(contacts);
        } else {
          console.error('Request failed');
        }
      }
    };
    xhr.send();
  }

  // Function to populate the phonebook table with contacts
  function populatePhonebook(contacts) {
    phonebookTable.innerHTML = ''; // Clear existing table contents

    // Create a new row for column names
    const headerRow = document.createElement('tr');
    const nameHeader = document.createElement('th');
    nameHeader.innerHTML = 'Name';
    headerRow.appendChild(nameHeader);

    const numberHeader = document.createElement('th');
    numberHeader.innerHTML = 'Number';
    headerRow.appendChild(numberHeader);

    const emailHeader = document.createElement('th');
    emailHeader.innerHTML = 'Email';
    headerRow.appendChild(emailHeader);

    const addressHeader = document.createElement('th');
    addressHeader.innerHTML = 'Address';
    headerRow.appendChild(addressHeader);

    const notesHeader = document.createElement('th');
    notesHeader.innerHTML = 'Notes';
    headerRow.appendChild(notesHeader);

    const actionHeader = document.createElement('th');
    actionHeader.innerHTML = 'Action';
    headerRow.appendChild(actionHeader);

    // Append the header row to the table
    phonebookTable.appendChild(headerRow);

    contacts.forEach(contact => {
      // Create a new row for the contact
      const row = document.createElement('tr');

      // Insert data cells
      const nameCell = document.createElement('td');
      nameCell.innerHTML = contact.name;
      row.appendChild(nameCell);

      const numberCell = document.createElement('td');
      numberCell.innerHTML = contact.number;
      row.appendChild(numberCell);

      const emailCell = document.createElement('td');
      emailCell.innerHTML = contact.email;
      row.appendChild(emailCell);

      const addressCell = document.createElement('td');
      addressCell.innerHTML = contact.address;
      row.appendChild(addressCell);

      const notesCell = document.createElement('td');
      notesCell.innerHTML = contact.notes;
      row.appendChild(notesCell);

      const actionCell = document.createElement('td');
      const deleteButton = document.createElement('button');
      deleteButton.innerHTML = 'Delete';
      deleteButton.addEventListener('click', () => {
        deleteContact(contact.id); // Delete the contact from the database
      });
      actionCell.appendChild(deleteButton);
      row.appendChild(actionCell);

      // Append the row to the table
      phonebookTable.appendChild(row);
    });
  }

  // Function to delete a contact from the database
  function deleteContact(id) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'delete_contact.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            fetchContacts(); // Fetch updated contacts and repopulate the table
          } else {
            console.error(response.error);
          }
        } else {
          console.error('Request failed');
        }
      }
    };
    const data = 'id=' + encodeURIComponent(id);
    xhr.send(data);
  }

  // Function to check if a contact with the same name already exists
  function checkDuplicateContact(name) {
    const contacts = Array.from(phonebookTable.getElementsByTagName('tr')).slice(1);
    return contacts.some(contact => {
      const nameCell = contact.getElementsByTagName('td')[0];
      return nameCell.textContent.trim().toLowerCase() === name.trim().toLowerCase();
    });
  }

  // Add event listener for form submission
  addForm.addEventListener('submit', (e) => {
    e.preventDefault();

    const name = document.getElementById('name').value;
    const number = document.getElementById('number').value;
    const email = document.getElementById('email').value;
    const address = document.getElementById('address').value;
    const notes = document.getElementById('notes').value;

    if (checkDuplicateContact(name)) {
      alert('User already exists.');
      return;
    }

    // Send data to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_contact.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            fetchContacts(); // Fetch updated contacts and repopulate the table
            addForm.reset();
          } else {
            console.error(response.error);
          }
        } else {
          console.error('Request failed');
        }
      }
    };
    const data = 'name=' + encodeURIComponent(name) + '&number=' + encodeURIComponent(number) +
      '&email=' + encodeURIComponent(email) + '&address=' + encodeURIComponent(address) +
      '&notes=' + encodeURIComponent(notes);
    xhr.send(data);
  });

  // Add event listener for search input
  searchInput.addEventListener('input', () => {
    const searchValue = searchInput.value.toLowerCase().trim();
    const rows = phonebookTable.getElementsByTagName('tr');
    let found = false;

    for (let i = 1; i < rows.length; i++) {
      const cells = rows[i].getElementsByTagName('td');
      let rowMatch = false;

      for (let j = 0; j < cells.length; j++) {
        const cellValue = cells[j].textContent.toLowerCase();

        if (cellValue.includes(searchValue)) {
          rowMatch = true;
          break;
        }
      }

      if (rowMatch) {
        rows[i].style.display = '';
        found = true;
      } else {
        rows[i].style.display = 'none';
      }
    }

    // Remove previous "No matches found" row
    const previousNoMatchRow = document.getElementById('noMatchRow');
    if (previousNoMatchRow) {
      previousNoMatchRow.remove();
    }

    // Show a message if no matches found
    if (!found && searchValue !== '') {
      const noMatchRow = document.createElement('tr');
      noMatchRow.id = 'noMatchRow';
      const noMatchCell = document.createElement('td');
      noMatchCell.colSpan = "6";
      noMatchCell.textContent = "No matches found.";
      noMatchRow.appendChild(noMatchCell);
      phonebookTable.appendChild(noMatchRow);
    }
  });

  // Fetch contacts when the page loads
  fetchContacts();
</script>
<br><br>
<div class ="contact" id="contact" style="background-color: #dc3545;height: 18%;text-align: center;">
<p>Contact Me:</p>
<h1>
    2021083@ub.edu.ph or
    dimplenismvalencia@gmail.com
</h1>

</div>

<div class ="social" id="social" style="padding: 3%;background-color: #dc3545;text-align: center;">
<a href="https://youtu.be/dQw4w9WgXcQ" class="icon-button twitter"><i class="fab fa-twitter"></i><span></span></a>
<a href="https://www.facebook.com/dimminminminminmin/" class="icon-button facebook"><i class="fab fa-facebook"></i><span></span></a>
<a href="https://www.instagram.com/dgv_arts/" class="icon-button instagram"><i class="fab fa-instagram"></i><span></span></a>

</div>


<div class=”footer-content”>
    <h3>ディンポル・ヴァレンシャ</h3>
</div>




<style>
    .h3, h3 {
    background-color: #f8f9fa;
    font-size: calc(1.3rem + .6vw);
    padding-top: 19%;
    text-align: center;
    padding-bottom: 3%;
    }
    
    .footer-content h3{
    font-size: 2.1rem;
    font-weight: 500;
    text-transform: capitalize;
    line-height: 3rem;
    
    }

    .carousel-item {
      height: 65vh;
      min-height: 350px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }

    .nav-link {
    display: block;
    padding: var(--bs-nav-link-padding-y) var(--bs-nav-link-padding-x);
    font-size: var(--bs-nav-link-font-size);
    font-weight: var(--bs-nav-link-font-weight);
    color: #e9ecef;
    text-decoration: none;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out;
    }
    .navbar-brand {
        padding-top: var(--bs-navbar-brand-padding-y);
        padding-bottom: var(--bs-navbar-brand-padding-y);
        margin-right: var(--bs-navbar-brand-margin-end);
        font-size: var(--bs-navbar-brand-font-size);
        color: #e9ecef;
        text-decoration: none;
        white-space: nowrap;
    }

</style>

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





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

