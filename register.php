<?php
ob_start();
session_start();
error_reporting(E_ALL);
$error = null;

// connect to the database
$db = mysqli_connect("localhost", "root", "", "php_blog");

// check if isset
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    $password = md5($password); //Hash password
    // select email to check if it exists in the database
    $select = mysqli_query($db, "SELECT `email` from `register` where `email`='" . $_POST['email'] . "'");
    if (mysqli_num_rows($select)) {
        $error = "someone already registered with that email";
    } else {
        $sql = "INSERT INTO register(username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($db, $sql);

        $_SESSION['username'] = $username;

        header("location:index.php");
    }

}

?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
   integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
 <link rel="stylesheet" href="css/bootstrap.min.css" />
 <link rel="stylesheet" href="styles.css" />
   <title>register</title>
 </head>
 <body>
 <div class="form-body w-5 mt-5">
   <div class="card card-body ">

   <form action="register.php" method="post" class="form-group w-100 p-3">
 <input type="text" name="username" required placeholder="username" class="form-control"  ><br>
 <input type="email" name="email" required placeholder="email" class="form-control"  ><br>
 <input type="password" name="password" required placeholder="password" class="form-control" id="myInput"><br>
<input type="checkbox"  onclick="myFunction()"> Show Password <br><br>
 <input class="btn btn-dark" type="submit" name="register" value="Register" required class="form-control"><br>

 <p>Already registered? <a href="login.php">login</a> </p>
 <?php echo "<p  class='error'> $error</p>"; ?>


 </form>
 <center>

 </center>

   </div>

 </div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<!-- offline -->
<script src="jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="login.js"></script>
<!-- end -->

 </body>
 </html>
