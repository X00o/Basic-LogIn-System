<?php
    $showAlert =false;
    $showError =false;
if($_SERVER ["REQUEST_METHOD"] == "POST"){
    include "component/_dbconnect.php";
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $existSql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn , $existSql);
    $numExistRows = mysqli_num_rows($result);
    
    if($numExistRows > 0){
      $showError = " Username Already Exist ";

    }else{
      
      
      if($password == $cpassword){
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql ="INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
        $result = mysqli_query($conn , $sql);
        if($result){
          $showAlert = true;
          // header("location: login.php");
        }
      }else{
        $showError ="Password Do not match";
      }
      
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dc2NSrAXbAkjrdm9IYrX10fQq9SDG6Vjz7nQVKdKcJl3pC+k37e7qJR5MVSCS+wR" crossorigin="anonymous">

    <title>Sign Up</title>
</head>

<body>
    <!-- navbar is here ... -->
    <?php require 'component/_nav.php' ?>
    <?php
if($showAlert){

echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Account is now created you can logIn Now.
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
    <div class="container my-4" style="max-width: 527px;">
        <h1 class='text-center '>Sign Up to My web site</h1>
        <form style="margin: 0 auto;" action="/loginsystem/signup.php" method="POST">
            <div class=" form-group mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="27" class="form-control" id="username" name="username"
                    aria-describedby="emailHelp">

            </div>
            <div class="form-group mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control" id="password" name="password">
            </div>
            <div class="form-group mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" maxlength="23" class="form-control" id="cpassword" name="cpassword">
                <div id="emailHelp" class="form-text">Make sure to type the same password.</div>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
        </form>
    </div>
    <?php
    ?>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>