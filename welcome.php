<?php


session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] != true){
  header("location: login.php");
  exit;
};

// if (!isset($_SESSION)) { session_start(); }
// $_SESSION = array(); 
// // session_destroy(); 
// header("Location: login.php"); // Or wherever you want to redirect
// exit();
//
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

    <title>Welcome <?php echo $_SESSION ['username'] ?> </title>
  </head>
  <body>

    <?php require 'component/_nav.php' ?>
    <div class="container my-4">
    <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome <?php echo $_SESSION ['username'] ?> </h4>
            <p>Aww yeah, you successfully Logged In to your Account as <?php echo $_SESSION ['username'] ?>. </p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to Log Out using this <i><a href="/loginsystem/logout.php">link</a></i></p>
      </div>
      </div>
   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
</html>