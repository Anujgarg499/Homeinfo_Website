<?php
session_start();
  include('function.php');
  if (isset($_POST['submit'])) 
  {
$mail=$_POST["mail"];
$pass=$_POST["pass"];
if(isset($mail) && isset($pass) && empty($mail) && empty($pass))
{
  echo'<script>alert("Email and password can not be left blank");window.location.href="http://localhost/homeinfo/ocheck.php";</script>';
}else{
      $conn=my_connect();
      $sql="select * from owner where mail='$mail' and pass='$pass'";
      $result=mysqli_query($conn,$sql)or die("unable to execute");
      while($row=mysqli_fetch_assoc($result))
      {
         $validuser=$row["oid"];
      }
      if(isset($validuser))
      {
        $_SESSION["validuser"] = $validuser;
         mysqli_close($conn);
          echo'<script>alert("Welcome");window.location.href="http://localhost/homeinfo/orent.php";</script>';
          }else{
            mysqli_close($conn);
            echo'<script>alert("Invalid User");window.location.href="http://localhost/homeinfo/ocheck.php";</script>';
              }
       
      }
    }
?>


<!DOCTYPE html>
<html>
<head>
  <title>OwnerLogin</title>
  <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
  <meta charset="utf-8"> 
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="container-fluid bg">
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    <div class="col-md-4 col-sm-4 col-xs-12">
    <form class="form-container" action="#" method="post">
      <h1 class="text-center text-white"> LOGIN </h1>
  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Enter email" required="">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="">
  </div>
  <button type="submit" class="btn btn-primary btn-block" name="submit">Login</button>
  <label id="sign">Does not have a Account?<a href="osignup.php"> Signup </a></label>
</form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12"></div>
    </div>
</div>
</body>
</html>