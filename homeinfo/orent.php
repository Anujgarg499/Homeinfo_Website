<?php
session_start();
if (isset($_SESSION["validuser"]))
 {

include('function.php');

if (isset($_POST['submit'])) 
  {

$oname=$_POST['oname'];
$oadd=$_POST['oadd'];
$mail=$_POST['mail'];
$phone=$_POST['phone'];
$hlocation=$_POST['hlocation'];
$desc=$_POST['desc'];
$hprice=$_POST['hprice'];
$filename=$_FILES['image']['name'];
$tmp_image=$_FILES['image']['tmp_name'];
$size_image=$_FILES['image']['size'];

$conn=my_connect();
$sql="select * from rent where oname='$oname' and hlocation='$hlocation'";
$query = mysqli_query($conn,$sql)or die("unable to execute");

$num=mysqli_num_rows($query);

if ($num==1) {
	echo '<script>alert("Already posted for this owner name and location")</script>';
}
else{
 
     $fileext = explode('.',$filename);
     $filecheck = strtolower(end($fileext));
     $fileextarr = array('png', 'jpg', 'jpeg');

     if(in_array($filecheck, $fileextarr))
     {

     	$destination = 'image/'.$filename;
     	move_uploaded_file($tmp_image, $destination);

	$sql =  "INSERT INTO `homeinfo`.`rent` (`rid`, `oname`, `oadd`, `mail`, `phone`, `hlocation`, `desc`, `hprice`, `img`) VALUES (NULL, '$oname', '$oadd', '$mail', '$phone', '$hlocation', '$desc', '$hprice', '$destination')";
	$query = mysqli_query($conn,$sql)or die("unable to execute");
    echo'<script>alert("Form submitted successfull");window.location.href="http://localhost/homeinfo/orent.php";</script>';
     }
	else
		{
			echo'<script>alert("Error in submission of form");window.location.href="http://localhost/homeinfo/orent.php";</script>';
		}

}
}
}
else
{
	echo'<script>alert("Invalid user");window.location.href="http://localhost/homeinfo/ocheck.php";</script>';
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Rent form</title>
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
<link href="css/rent.css" type="text/css" rel="stylesheet">
<script type="text/javascript">
  function validate() {
  var mail = document.getElementById('mail').value;
  var phone = document.getElementById('phone').value;

  if (mail=="" || phone=="") {
    alert("please fill all values");
    return false;
  }
  else{
    var pattern1 = /^[a-zA-Z0-9_.-]{3,}\@[a-zA-Z0-9_-]{3,}\.[a-zA-Z]{2,}$/;
    var p1 = pattern1.test(mail);
    var pattern2 = /^[897]\d\d[- ]?\d{3}[- ]?\d{4}$/;
    var p2 = pattern2.test(phone);

    if (p1==false) {
      alert("Invalid Email");
      return false;
    }
    else if (p2==false) {
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
	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<div class="container-fluid">
		<a href="#" class="navbar-brand text-warning font-weight-bold">  HomeInfo  </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-center" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">For Rent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="osale.php">For Sale</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
  </div>
    </nav>
<div class="container-fluid backclr">
<div class="row">
<div class="col-md-4 col-sm-4"></div>
<div class="col-md-4 col-sm-4">
<!----starting of form----->

<div class="form-container">

<h1 class="heading" ">WELCOME TO RENT PAGE</h1>

<form class="check" method="post" action="#" onsubmit="return validate()" enctype="multipart/form-data">
	
<div class="form-group">
    <label for="Name">Owner Name</label>          
			<input type="text" class="form-control" id="oname" placeholder="Name" name="oname" required="">
				</div>
				

<div class="form-group">
	<label for="OwnerA">Owner Address</label>
		<input type="text" class="form-control" id="oadd" placeholder="Address" name="oadd" required="">
		    </div>
			   

<div class="form-group">
	<label for="Email">Email ID</label>
		<input type="email" class="form-control" id="mail" placeholder="Email" name="mail" required="">
		    </div>
			

<div class="form-group">
	<label for="Phone">Phone No.</label>
	    <input type="text" class="form-control" id="phone" placeholder="Ph no." name="phone" required="">
		    </div>
			

<div class="form-group">
	<label for="Hlocation">Home Location</label>
		<input type="text" class="form-control" id="hlocation" placeholder="Location" name="hlocation" required="">
			</div>
			
				
<div class="form-group">
	<label for="Descript">Description</label>
		<textarea class="form-control" rows="5" id="desc" placeholder="Home Details" name="desc" required=""></textarea>
		    </div>
		
<div class="form-group">
	<label for="Hprice">Price</label>
		<input type="text" class="form-control" id="hprice" placeholder="Price" name="hprice" required="">
			</div>


<div class="form-group">
	    <label for="Name">Home Image</label>
	        <input type="file" id="image" class="form-control" name="image" required="">
                </div> 

				
<div class="form-group">        
	<button type="submit" name="submit" id="submit" value="submit" class="btn btn-success btn-lg round">Submit</button>
	    </div>

</form>
<!----ending of form----->
</div>
</div>
</div>
</div>
</body>
</html>