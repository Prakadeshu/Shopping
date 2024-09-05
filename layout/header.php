<?php
session_start();

$authenticated = false;
if(isset($_SESSION["email"])){
  $authenticated = true;
}
?>




  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riverdale Shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
         #header{
            position: relative;
            left: 150px;
        }
/*
        #register{
              position: relative;
              left: 200px;
        }     */
        
    </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="C:\xampp\htdocs\my-website\register\resgisterphp\index.php"> <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                  <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                </svg> <h2>Riverdale Shopping</h2>
        
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="header" class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        
        <li class="nav-item dropdown">
          <a  class="nav-link " href="about.php" role="button"  aria-expanded="false">
            About Us
          </a>
          <!-- <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul> -->
        </li>

        <li class="nav-item dropdown">
          <a  class="nav-link " href="pricing.php" role="button" aria-expanded="false">
            Pricing
          </a>
          </li>

          <li class="nav-item dropdown">
          <a  class="nav-link " href="services.php" role="button"  aria-expanded="false">
            Service
          </a>
          </li>

          <li class="nav-item dropdown">
          <a  class="nav-link " href="contact-view.php" role="button"  aria-expanded="false">
            Contact Us
          </a>
          </li>

          <?php
if($authenticated){

?>

      <ul class="navbar-nav ">
      <li class="nav-item dropdown">
          <a  class="nav-link dropdown-toggle text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admin
          </a>
          <ul class="dropdown-menu">
            
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
          </ul>
        </li>
    </ul>
    <?php
}else{



?>

    <ul class="navbar-nav " id="register">
    <li class="nav-item">
      <a href="register.php" class="btn btn-outline-primary me-2">Register</a>
    </li>
    <br>
    <li class="nav-item">
      <a href="login.php" class="btn btn-primary">Login</a>
    </li>
    </ul>
    <?php
}



?>
       
      </ul>


    </div>
  </div>
</nav>


