<?php
session_start();
include('function.php');
if (isset($_POST['submit'])) 
  {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mail=$_POST['mail'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$add=$_POST['add'];
$phone=$_POST['phone'];

$conn=my_connect();
$sql="select * from user where mail='$mail' and pass='$pass'";
$query = mysqli_query($conn,$sql)or die("unable to execute");

$num=mysqli_num_rows($query);

if ($num==1) {
	echo '<script>alert("Already registered");</script>';
}
else{
	$sql =  "INSERT INTO `homeinfo`.`user` (`uid`, `fname`, `lname`, `mail`, `pass`, `cpass`, `add`, `phone`) VALUES (NULL, '$fname', '$lname', '$mail', '$pass', '$cpass', '$add', '$phone')";
	$query = mysqli_query($conn,$sql)or die("unable to execute");
    echo'<script>alert("Registration successfull");window.location.href="http://localhost/homeinfo/ucheck.php";</script>';

}
}

?>

<!DOCTYPE html>
<html>
<head>
<title>sign up</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/user1.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
  function validate() {
  var fname = document.getElementById('fname').value;
  var lname = document.getElementById('lname').value;
  var mail = document.getElementById('mail').value;
  var pass = document.getElementById('pass').value;
  var cpass = document.getElementById('cpass').value;
  var add = document.getElementById('add').value;
  var phone = document.getElementById('phone').value;

  if (fname=="" || lname=="" || mail=="" || pass=="" || cpass=="" || add=="" || phone=="") {
    alert("please fill all values");
    return false;
  }
  else{
    var pattern1 = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/; //[a-zA-Z]\w*\s[a-zA-Z]\w*(\s[a-zA-Z]\w*)?
    var p1 = pattern1.test(fname);
    var pattern2 = /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/; //[a-zA-Z]\w*\s[a-zA-Z]\w*(\s[a-zA-Z]\w*)?
    var p2 = pattern2.test(lname);
    var pattern3 = /^[a-zA-Z0-9_.-]{3,}\@[a-zA-Z0-9_-]{3,}\.[a-zA-Z]{2,}$/;
    var p3 = pattern3.test(mail);
    var pattern4 = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    var p4 = pattern4.test(pass);
    var pattern5 = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    var p5 = pattern5.test(cpass);
    var pattern6 = /^[897]\d\d[- ]?\d{3}[- ]?\d{4}$/;
    var p6 = pattern6.test(phone);

    if (p1==false) {
      alert("Invalid First Name Input");
      return false;
    }
    else if (p2==false) {
      alert("Invalid Last Name Input");
      return false;
    }
    else if (p3==false) {
      alert("Invalid Email");
      return false;
    }
    else if (p4==false) {
      alert("Password should be atleast 8 characters long containing one Capital Letter, one special character, one number.");
      return false;
    }
    else if (p5==false) {
      alert("Confirm Password should be atleast 8 characters long containing one Capital Letter, one special character, one number.");
      return false;
    }
    else if (pass != cpass) {
      alert("Password and Confirm Password should match");
      return false;
    }
    else if (p6==false) {
      alert("Invalid Phone Number");
      return false;
    }
    else {
    return true;
    }
  }
}
</script>
</head>
<body>
<div class="container-fluid bgcolour">
<div class="row">
<div class="col-md-4 col-sm-4"></div>
<div class="col-md-4 col-sm-4">
<!----starting of form----->
<form class="form-container" action="#" onsubmit="return validate()" method="post">
<h1 align="center">~~~Welcome~~~</h1>
<div class="form-group">
    <label for="Name">First Name</label>
    <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required="">
  </div>
  <div class="form-group">
    <label for="name">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required="">
  </div>
<div class="form-group">
    <label for="Email">Email Address</label>
  <input type="email" class="form-control" id="mail" name="mail" placeholder="Email" required="">
  </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="">
  </div>
  <div class="form-group">
    <label for="password">Confirm Password</label>
    <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm Password" required="">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="add" name="add" placeholder="Address" required="">
  </div>
  <div class="form-group">
    <label for="ph.no">Phone no.</label>
    <input type="phone no" class="form-control" id="phone" name="phone" placeholder="Phone no." required="">
  </div>

  <button type="submit" name="submit" id="submit" class="btn btn-info btn-lg round ">Submit</button>
  <label id="login">Already have an Account?<a href="ucheck.php"> Login </a></label>
  </form>
<!----ending of form----->
</div>
</div>
</div>
</body>
</html>