<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHONEBOOK-sign up</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="x-icon" href="https://static.vecteezy.com/system/resources/previews/008/703/095/large_2x/grunge-icon-of-cute-kawaii-cat-vector.jpg" sizes= 200px>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
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
    <a class="navbar-brand" href="index.php">Dimple Valencia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php#contact">Contact Details</a>
        </li>
        <li class="nav-item">
          <form method="post">
            <a class="nav-link" href="Navigation/loginform.php">Log In</a>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid p-5 bg-danger text-white text-center">
    <br>
  <p>WELCOME to my WEBSITE :)</p> 
</div>
  
<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <h2 class="fw-bold mb-2 text-uppercase">Sign Up</h2>
              <p class="text-white-50 mb-5">Please enter your credentials</p>

              <?php if (isset($_GET['error']) && $_GET['error'] === 'exists'): ?>
                <div class="alert alert-danger" role="alert">
                  Username already exists. Please choose a different username.
                </div>
              <?php endif; ?>

              <?php if (isset($_GET['signup']) && $_GET['signup'] === 'success'): ?>
                <div class="alert alert-success" role="alert">
                  Signup successful. You can now log in.
                </div>
              <?php endif; ?>

              <form id="signupForm" action="connection.php" method="POST">
                <div class="form-outline form-white mb-4">
                  <input type="email" id="typeEmailX" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Email</label>
                </div>
                
                <div class="form-outline form-white mb-4">
                  <input type="Username" id="typeUsernameX" name="username" class="form-control form-control-lg" />
                  <label class="form-label" for="typeUsernameX">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" id="typePasswordX" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>

                <button id="signupButton" class="btn btn-outline-light btn-lg px-5" type="submit">Sign Up</button>
              </form>

              <div>
                <p class="mb-0">Already have an account? <a href="Navigation/loginform.php" class="text-white-50 fw-bold">Log In</a></p>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="footer-content">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
