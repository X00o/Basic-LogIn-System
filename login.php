<?php
    $login =false;
    $showError =false;
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    include "component/_dbconnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
     
      $sql ="SELECT * FROM users where username ='$username'";
      $result = mysqli_query($conn , $sql);
      $num =mysqli_num_rows($result);// what it's tells?
      if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
          if (password_verify($password , $row['password'])){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");
          }else{
            $showError = "Invalid Credentials";
        }
      }

    }else{
          $showError = "Invalid Credentials";
  }
    

}
    ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css" integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
      <!-- navbar is here ... -->
    <?php require 'component/_nav.php' ?>
    <?php
if($login){
echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> you are Logged in
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
';}
if($showError){
echo' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed!</strong> '. $showError .'
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
';}
 ?>
 <!-- sign up content goes here .. -->
<div class="container my-4"  style="max-width: 527px;">
    <h1 class='text-center ' >Login to My web site</h1>
    <form style="margin: 0 auto;" action= "/loginsystem/login.php" method ="POST" >
  <div class=" form-group mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
 
  </div>
  <div class="form-group mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <button type="submit" class="btn btn-primary">logIn</button>
</form>
</div>


   
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </body>
</html>