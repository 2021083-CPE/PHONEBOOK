<?php
session_start(); // Start the session

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: index.php");
    exit;
}

// Logout functionality
if (isset($_POST['logout'])) {
    // Destroy the session and redirect to the login page
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Dimple Valencia</title>
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
    <a class="navbar-brand" href="userAccount.php">Dimple Valencia</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="userAccount.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userAccount.php#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userAccount.php#contact">Contact Details</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact/phonebook.php">PHONEBOOK</a>
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
<div class="home">
    <div class = "eye">
    <svg width="512" height="512" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
    
    <rect width="512" height="512" fill="#fff"/>
    <g filter="url(#twitch)">
    	<use href="#eye01" x="64" y="128"/>
    	<use href="#eye01" x="256" y="128"  transform="rotate(10 256 128) scale(1 0.75)" opacity="0.6"/>
    	<use href="#eye01" x="256" y="320"  transform="rotate(-15) scale(-1.1 0.9)" transform-origin="312 360"/>
    	<use href="#eye01" x="128" y="220"  transform="scale(-0.8 0.9)" transform-origin="130 280" opacity="0.8"/>
    	
    	<use href="#eye02" x="170" y="180 "/>
    	<use href="#eye02" x="360" y="260" transform="rotate(-15) scale(0.45 0.6)" transform-origin="360 260" opacity="0.7"/>
    	<use href="#eye02" x="120" y="480" transform="rotate(5) scale(0.5 0.4)" transform-origin="180 360" opacity="0.85"/>
    	
    	<use href="#eye03" x="30" y="320" transform="scale(1.2 1.3) rotate(5 120 320)" opacity="0.6" transform-origin="40 320"/>
    	<use href="#eye03" x="340" y="180" transform="rotate(-5 360 120)" opacity="0.9"/>
    	
    	<use href="#eye04" x="140" y="260" opacity="0.9"/>
    	<use href="#eye04" x="240" y="440" transform="rotate(15) scale(0.7 0.7)" transform-origin="240 440" opacity="0.7"/>
    </g>
    <defs>
    	<g id="eye01">
    		<path fill="#E0E8EA" id="eyeb01">
    			<animate attributeName="d" dur="4s" repeatCount="indefinite" calcMode="spline"
    				keyTimes="0;0.05;0.75;0.8;1"
    				keySplines="0 0.5 0.9 0.1; 1 1 1 1; 0 0.5 0.9 0.1; 1 1 1 1"
    				values="M10 42  C24 44 24 44 60 44  C102 44 102 35 118 28  C102 35 102 44 60 44  C24 44 24 44 10 42Z;
    						M0 42  C1 32 15 0 58 0  C101 0 122 17 128 28  C117 39 89 61 64 63  C38 65 10 50 0 42Z;
    						M0 42  C1 32 15 0 58 0  C101 0 122 17 128 28  C117 39 89 61 64 63  C38 65 10 50 0 42Z;
    						M10 42  C24 44 24 44 60 44  C102 44 102 35 118 28  C102 35 102 44 60 44  C24 44 24 44 10 42Z;
    						M10 42  C24 44 24 44 60 44  C102 44 102 35 118 28  C102 35 102 44 60 44  C24 44 24 44 10 42Z" />
    		</path>
    		<ellipse id="eyep01" cx="56" cy="32" rx="6" ry="12" fill="#141717">
    			<animate attributeName="ry" dur="4s" repeatCount="indefinite" calcMode="linear" 
    				keyTimes="0;0.2;0.6;1"
    				values="12; 24; 24; 12"/>	
    			<animate attributeName="cx" dur="3s" repeatCount="indefinite" calcMode="spline" 
    				keyTimes="0;0.1;0.2;0.5;1"
    				keySplines="1 1 1 1; 1 0 0.8 0.5; 1 0 0.8 0.5; 1 0 0.8 0.5"
    				values="56; 56; 72; 48; 56;"/>	
    		</ellipse>
    	</g> 
    	<g id="eye02">
    		<path fill="#E0E8EA" id="eyeb02">
    			<animate attributeName="d" dur="5s" repeatCount="indefinite" calcMode="spline" begin="400ms"
    				keyTimes="0;0.03;0.88;0.92;1"
    				keySplines="0 0.5 0.9 0.1; 1 1 1 1; 0 0.5 0.9 0.1; 1 1 1 1"
    				values="M140 59  C142 59 142 59 87 59  C33 59 33 59 20 53  C33 59 33 59 87 59  C142 59 142 59 140 59Z;
    						M160 59  C154 42 133 0 79 0  C24 0 14 31 0 53  C44 71 44 88 91 87  C137 87 146 62 160 59Z;
    						M160 59  C154 42 133 0 79 0  C24 0 14 31 0 53  C44 71 44 88 91 87  C137 87 146 62 160 59Z;
    						M140 59  C142 59 142 59 87 59  C33 59 33 59 20 53  C33 59 33 59 87 59  C137 59 142 59 140 59Z;
    						M140 59  C142 59 142 59 87 59  C33 59 33 59 20 53  C33 59 33 59 87 59  C137 59 142 59 140 59Z"/>
    		</path>
    		<ellipse id="eyep02" cx="112" cy="48" rx="8" ry="4" fill="#141717">
    			<animate attributeName="ry" dur="5s" repeatCount="indefinite" calcMode="linear"  begin="400ms"
    				keyTimes="0;0.06;0.85;1"
    				values="4; 24; 24; 4"/>	
    			<animate attributeName="rx" dur="4s" repeatCount="indefinite" calcMode="linear"  begin="400ms"
    				keyTimes="0; 0.15; 0.2; 0.85;1"
    				values="8; 8; 14; 8; 8"/>	
    			<animate attributeName="cx" dur="4s" repeatCount="indefinite" calcMode="spline"  begin="400ms"
    				keyTimes="0;0.1;0.2;0.5;1"
    				keySplines="1 1 1 1; 1 0 0.8 0.5; 1 0 0.8 0.5; 1 0 0.8 0.5"
    				values="76; 76; 122; 68; 76;"/>	
    			<animate attributeName="cy" dur="10s" repeatCount="indefinite" calcMode="linear"  begin="400ms"
    				values="48; 36; 50; 48; 48; 32; 24; 48"/>	
    		</ellipse>
    	</g>  
    	<g id="eye03">
    		<path fill="#E0E8EA" id="eyeb03">
    			<animate attributeName="d" dur="4500ms" repeatCount="indefinite" calcMode="spline" begin="250ms"
    				keyTimes="0;0.04;0.93;0.98;1"
    				keySplines="0 0.5 0.9 0.1; 1 1 1 1; 0 0.5 0.9 0.1; 1 1 1 1"
    				values="M108 26  C88 22 86 28 40 24  C22 22 22 22 0 16  C22 22 24 23 41 25  C88 24 88 23 108 26Z;
    						M128 6  C101 1 71 0 40 0  C24 0 7 12 0 16  C16 22 50 34 76 34  C102 34 123 16 128 6Z;
    						M128 6  C101 1 71 0 40 0  C24 0 7 12 0 16  C16 22 50 34 76 34  C102 34 123 16 128 6Z;
    						M108 26  C88 22 86 28 40 24  C22 22 22 22 0 16  C22 22 24 23 41 25  C88 24 88 23 108 26Z;
    						M108 26  C88 22 86 28 40 24  C22 22 22 22 0 16  C22 22 24 23 41 25  C88 24 88 23 108 26Z"/>
    		</path>
    		<ellipse id="eyep03" cx="64" cy="8" rx="4" ry="12" fill="#141717">
    			<animate attributeName="ry" dur="4500ms" repeatCount="indefinite" calcMode="linear"  begin="250ms"
    				keyTimes="0;0.06;0.95;1"
    				values="4; 12; 12; 4"/>	
    			<animate attributeName="cx" dur="12s" repeatCount="indefinite" calcMode="spline"  begin="250ms"
    				values="64; 64; 72; 94; 48; 64"/>	
    		</ellipse>
    	</g> 
    	<g id="eye04" transform="scale(0.4 0.4)" transform-origin="0 0">
    		<path fill="#E0E8EA" id="eyeb04">
    			<animate attributeName="d" dur="4500ms" repeatCount="indefinite" begin="600ms"
    				keyTimes="0;0.04;0.93;0.98;1"
    				keySplines="0 0.5 0.9 0.1; 1 1 1 1; 0 0.5 0.9 0.1; 1 1 1 1"
    				values="M114 52  C100 68 100 68 80 80  C33 90 33 90 0 80  C33 90 33 90 68 80  C100 70 100 70 114 52Z;
    						M114 52  C108 27 89 -12 43 4  C0 20 0 56 0 79  C12 81 29 102 66 94  C103 86 114 76 114 52Z;
    						M114 52  C108 27 89 -12 43 4  C0 20 0 56 0 79  C12 81 29 102 66 94  C103 86 114 76 114 52Z;
    						M114 52  C100 80 100 80 80 80  C33 80 33 80 0 80  C33 80 33 80 80 80  C100 80 100 80 114 52Z;
    						M114 52  C100 80 100 80 80 80  C33 80 33 80 0 80  C33 80 33 80 80 80  C100 80 100 80 114 52Z"/>
    		</path>
    		<ellipse id="eyep04" cx="56" cy="48" rx="10" ry="12" fill="#141717">
    			<animate attributeName="ry" dur="4500ms" repeatCount="indefinite" calcMode="linear" begin="600ms"
    				keyTimes="0;0.1;0.9;1"
    				values="12; 24; 24; 12"/>	
    			<animate attributeName="cx" dur="500ms" repeatCount="indefinite" calcMode="discrete" begin="600ms"
    				values="56; 48; 52; 48; 56;"/>	
    		</ellipse>
    
    		<filter id="twitch">
    			<feTurbulence type="turbulence" baseFrequency="0.02" numOctaves="1">
    				<animate attributeName="seed" from="1" to="100" dur="20s" repeatCount="indefinite" />
    			</feTurbulence>
    		<feDisplacementMap in2="turbulence" in="SourceGraphic" scale="8" xChannelSelector="R" yChannelSelector="G" />
    	</filter>
    	</g> 
    </defs>
    </svg>
    </div>

<div class="main">
  <h1>Hi! I am Dimple :) <div class="roller">
    <span id="rolltext">A Student<br/>
    An Artist<br/>
    INFJ<br/>
    <span id="spare-time">Practice makes Progress</span><br/>
    </div>
    </h1>
    
  </div>
</div>


<div class="about" id="about">
  <div class="profile">
    <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/181553678_2480961738778009_1189000960789275027_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=174925&_nc_eui2=AeGIb6RTU-_wpwCGr18FBxDmSQLWhHzSnWpJAtaEfNKdaj0gg7M6OUus4unU1lpbkxdvRRq9FfI_4ngOK8bVmDn9&_nc_ohc=yxVbSxbkCpMAX-QM9Vg&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfCYjxj_axwGliQJ-4JsGZXVl6BhYYJsZ6a8Z5kAOM1Mvw&oe=64D05C5F" alt="Profile Picture">
    <h1>About Me</h1>
    <p>
 Hi! I'm Dimple Valencia, an aspiring software engineer and a passionate artist. Currently, I'm a third-year student taking up BS in Computer Engineering at UB Lipa. I have a deep love for both technology and art, constantly exploring the intersection between the two. From creating beautiful software solutions to expressing my creativity through artworks, I find joy in the process of bringing ideas to life. Feel free to explore my portfolio and get to know more about my work!
   
    </p>
  </div>
  <div class="gallery">
    <!-- Add your art gallery content here -->
    <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t1.6435-9/160537871_2439650019575848_2471880212307949459_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=0debeb&_nc_eui2=AeHKmRbBtBh_fChRg3wUGHDhY4OmiZBdhixjg6aJkF2GLDZNih-7gW32V7B-5dyn8qzBU2uNsDSV9podKa4OI9ta&_nc_ohc=XXQWRTB3EGsAX_2cP_2&_nc_ht=scontent.fmnl13-1.fna&oh=00_AfB2hEmavFQGaPq-N_UL_NcEiaMVzkNGwz4toE4T6lvpEg&oe=64D0595D" alt="Artwork 1">
    <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t39.30808-6/350134875_3094441567430020_7566114018025096013_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=0debeb&_nc_eui2=AeF-W_KBjYf7GaufCiRFnEGyGCRESF0YTg8YJERIXRhOD9fctrJSBFDZhyimuLx2D8nN8LtpWZPSbtxFhecKgKJj&_nc_ohc=KFMdmMPgyqEAX-CgXTS&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfBukQngdkgkWUR67bYfqJ0HLWsCONl5rKKkyjYnzp_EkA&oe=64BF2B55" alt="Artwork 2">
    <img src="https://scontent.fmnl13-2.fna.fbcdn.net/v/t1.6435-9/168914177_2457093027831547_759463653495318200_n.jpg?_nc_cat=108&ccb=1-7&_nc_sid=0debeb&_nc_eui2=AeEcafXiqa-CPlGFBazArAXEdoZlGIheS5F2hmUYiF5LkYVWwrdR_reS0qq9vC7nfHO5CFp0n_CJB5mAaNqgV94K&_nc_ohc=Zs53FfW1wTgAX8lLuiT&_nc_ht=scontent.fmnl13-2.fna&oh=00_AfAsudytxnwkF4voMXCN-jPrRLamNAMqcc6Axmpt-VURxA&oe=64D04EFB" alt="Artwork 3">
    <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/300497367_2862902227250623_4669098923226357847_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGkoY48TOqs7FCVZMCZ5EqKw3LxBdUhOuHDcvEF1SE64Xfyzqx0UOqbCFrIb4Uf5-am0L7dMf4Tvxlzt_2ZX7Mb&_nc_ohc=8a9akhQLW4QAX_xE7FI&_nc_ht=scontent.fmnl13-1.fna&oh=00_AfBRrjiGOqOf8t1JZ7bxz5Gg166KXuc7hr50MFSisfqsLA&oe=64BE8EBB" alt="Artwork 4">
    <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/296260096_2840717702802409_4578717277733232227_n.jpg?_nc_cat=103&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeEysdoGAlQhKLn-6q_2ROR2PAnysbEC9948CfKxsQL33q2-2NSJ5v1G1GKvidka3HryWkG3mf5xy5IH1W0qJ4VP&_nc_ohc=uk3Jbj1P398AX84rdAJ&_nc_ht=scontent.fmnl13-1.fna&oh=00_AfCNeIccUjjyoi9oriqJlXXcVJE6oOs5Sh9zuxdxSOg8Mg&oe=64BF4D52" alt="Artwork 5">
    <img src="https://scontent.fmnl13-1.fna.fbcdn.net/v/t39.30808-6/233614976_2557181651156017_3739279968468061599_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=0debeb&_nc_eui2=AeGkC31mwYt4zDHkaWbwBOtQ11QSoQ9IYMLXVBKhD0hgwnQ63NKgVfWJy7ni3kpiGYnFcN5dK-WDQntbrQqK8zmy&_nc_ohc=jF1d7uLUAv4AX9EET9O&_nc_ht=scontent.fmnl13-1.fna&oh=00_AfAcx7xhxuJl9U-tYHLVgtQG6mGVjBuPGI7YZEgBJ0ox2g&oe=64BF6222" alt="Artwork 6">
    
    <!-- Add more images as needed -->
  </div>
</div>
<!-- MY GITHUB -->



    <h1 style="
    font-weight: 900;
    background-color: bisque;
    padding: 3%;
">PROGRAMMING</h1>
    <div class="move">

        <div class="card" style="--clr: #009688">
            <div class="img-box">
                <img src="https://raw.githubusercontent.com/2021083-CPE/GHOST-first-game/master/Screenshot%202023-07-10%20210437.png">
            </div>
            <div class="content">
                <h2>Pygame</h2>
                <p>
                    A simple game using pygame.
                </p>
                <a href="https://github.com/2021083-CPE/GHOST-first-game.git">Read More</a>
            </div>
        </div>
        <div class="card" style="--clr: #FF3E7F">
            <div class="img-box">
                <img src="https://raw.githubusercontent.com/2021083-CPE/CES-PROJECT/master/Screenshot%202023-07-10%20210949.png">
            </div>
            <div class="content">
                <h2>Dynamic Website</h2>
                <p>
                    It serves as an introduction to building interactive and responsive web applications.
                </p>
                <a href="https://github.com/2021083-CPE/CES-PROJECT.git">Read More</a>
            </div>
        </div>
        <div class="card" style="--clr: #03A9F4">
            <div class="img-box">
                <img src="https://raw.githubusercontent.com/2021083-CPE/CALCULATOR/main/Screenshot%202023-07-10%20211429.png">
            </div>
            <div class="content">
                <h2>Simple Calculator</h2>
                <p>
                    A basic calculator application implemented in the Java programming language.
                </p>
                <a href="https://github.com/2021083-CPE/CALCULATOR.git">Read More</a>
            </div>
        </div>
    </div>



<div class="contact" id="contact" style="color: antiquewhite; background-color: #dc3545; height: 18%; text-align: center; padding-top: 50px;">
    <h1 style = "padding: 20px;
    text-align: justify;
    font-weight: 900;
    font-size: 43px;">Get In Touch!</h1>
    <p style ="    color: floralwhite;
    padding-left: 3%;
    display: block;
    text-align: justify;
    font-size: 15px;">
        <i class="fas fa-envelope"></i> email: 2021083@ub.edu.ph<br>
        <i class="fas fa-envelope"></i> email: dimplevalencia0216@gmail.com<br>
        <i class="fas fa-phone"></i> mobile no: 0949-802-5304<br>
        <i class="fas fa-map-marker-alt"></i> location: Paligawan, Balete, Batangas
    </p>
</div>

<div class="social" id="social" style=" padding-bottom: 7%; background-color: #dc3545; text-align: center;">
    <a href="https://youtu.be/dQw4w9WgXcQ" class="icon-button twitter"><i class="fab fa-twitter"></i><span></span></a>
    <a href="https://www.facebook.com/dimminminminminmin/" class="icon-button facebook"><i class="fab fa-facebook"></i><span></span></a>
    <a href="https://www.instagram.com/dgv_arts/" class="icon-button instagram"><i class="fab fa-instagram"></i><span></span></a>
    <a href="https://github.com/2021083-CPE" class="icon-button icon-github"><i class="fab fa-github"></i><span></span></a>


</div>



<style>
    .h3, h3 {
    background-color: #f8f9fa;
    font-size: calc(1.3rem + .6vw);
    padding-top: 10%;
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
        @media (max-width: 416px) {
      .social {
        padding-top: 35%;
        padding-bottom: 9%;
      }
    }

</style>
<div class=”footer-content”>
    <h3>ディンポル・ヴァレンシャ</h3>
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





<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>

