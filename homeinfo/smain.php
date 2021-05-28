<?php
session_start();
if (isset($_SESSION["validuser"]))
 {

include('function.php');

$conn=my_connect();
$query = "select * from sale ORDER BY sid ASC";  
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>sale form</title>
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
<link href="css/main.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="container top">
	<nav class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<div class="container-fluid">
		<a href="#" class="navbar-brand text-warning font-weight-bold">  HomeInfo  </a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-center" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="main.php">For Rent</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#">For Sale</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="ulogout.php">Logout</a>
      </li>
    </ul>
  </div>
  </div>
    </nav>
</div>

<div class="container heading" style="margin-top: 70px;"> 
	<div class="row">
		<div class="col-12 text-center">
		     <h1> Properties For Sale</h1>
			<div class="underline"></div>
			<br>
		</div>
	</div>
</div>

<div class="container view" style="width: 700px;">
	<?php  
		  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">     
                          <div class="card" style="width:600px;margin-bottom: 20px;" align="center">
	  							<img class="card-img-top" src="<?php echo $row["img"]; ?>" alt="Card image">
	  							<div class="card-body">
							    <h4 class="card-title text-info">Location :- <?php echo $row["hlocation"]; ?></h4>
							    <p class="card-text text-danger">Rs <?php echo $row["hprice"];?></p>
							    <p class="card-text">Description :- <?php echo $row["desc"];?></p>
							    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row["sid"]; ?>">
									  View Contact Details
									</button>
							   
  </div>
</div>  
<!-- The Modal -->
<div class="modal" id="myModal<?php echo $row["sid"]; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Owners Contact Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <h4 class="modal-title">Owners Name :- <?php echo $row["oname"]; ?></h4>
        <p class="modal-dialog">Owner Address :- <?php echo $row["oadd"];?></p>
        <p class="modal-dialog">Owner Email :- <?php echo $row["mail"];?></p>
        <p class="modal-dialog">Owner Contact Number :- <?php echo $row["phone"];?></p>
        <p class="modal-dialog">Property Location :- <?php echo $row["hlocation"];?></p>
        <p class="modal-dialog">Rs <?php echo $row["hprice"];?></p>
        <p class="modal-dialog">Description :- <?php echo $row["desc"];?></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

       </div>  
                <?php  
                     }  
                }  
                ?>  
</div>
 </body>
 </html>
<?php 

}
else
{
	echo'<script>alert("Invalid user");window.location.href="http://localhost/homeinfo/ucheck.php";</script>';
}

 ?>