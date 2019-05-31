<?php
	include("session.php");
	if(!isset($_SESSION["UID"])){
		header("location:home.php");
	}
	include("config.php");
	if(isset($_POST["submit"])){
		$customer = $_POST["customer"];
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$gridRadios = $_POST["gridRadios"];
		$phone = $_POST["phone"];
		$email= $_POST["email"];
		$address= $_POST["address"];
		$usertype = "Client";
		$password = "";

		$db1 = "select U_ID  from users where U_ID = '$customer'";
		$result1 = mysqli_query($connection, $db1);
		$row = mysqli_num_rows($result1);

		if($row > 0){
			echo "User ID is present";
		}else{
			$db = "INSERT INTO users(U_ID, F_name, L_name, Gender, Email, Phone, Address, User_type, Password, date_registered) 
					values('$customer', '$fname', '$lname', '$gridRadios', '$email', '$phone', '$address', '$usertype', '$password', Now())";
			$result = mysqli_query($connection, $db);
			if($result){
			echo "customer added";
			}else{
				echo "error ".mysqli_error($connection);
			}
		}
	
	}	

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Customers</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0 ">
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1 class="text">Library Management System</h1>
				</div>
			</div>
			<!-- End of row 1-->
			<div class="row">
				<div class="col-md-2">
						<div class="navbar navbar-default row">
						<ul class="nav navbar-bar">
							<li class="active"><a href="addbooks.php">Add Books</a></li>
							<li><a href="addcustomers.php">Add Costomers</a></li>
							<li><a href="viewbooks.php">View Books</a></li>
							<li><a href="issuebook.php">Issue Books</a></li>
							<li><a href="viewissuedbooks.php">View Issued Books</a></li>
							<li><a href="viewcustomers.php">View Customers</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-10">
					<form action ="addcustomers.php" method="post">
						 <div class="form-group row">
					   		 <label for="inputEmail3" class="col-sm-2 col-form-label">User ID</label>
					    	<div class="col-sm-10">
					      	<input type="text" class="form-control" name="customer" placeholder="Enter customer ID">
					    	</div>
					  	</div>
 						 <div class="form-group row">
					   		 <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
					    	<div class="col-sm-10">
					      	<input type="text" class="form-control" name="fname" placeholder="Enter customer first name">
					    	</div>
					  	</div>
					  	<div class="form-group row">
					    <label for="inputPassword3" class="col-sm-2 col-form-label">Last Name</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" name="lname" placeholder="Enter customer last name">
					    </div>
					  	</div>
					    <div class="row">
					      <label class="col-form-label col-sm-2 pt-0">Gender</label>
					      <div class="col-sm-10">
					        <div class="form-check">
					          <input class="form-check-input" value="Male" type="radio" name="gridRadios">
					          <label class="form-check-label" valuefor="gridRadios1">
					            Male
					          </label>
					        </div>
					        <div class="form-check">
					          <input class="form-check-input" type="radio" value="Female" name="gridRadios">
					          <label class="form-check-label" for="gridRadios2">
					            Female
					          </label>
					        </div>
					      </div>
					    </div>
					    <div class="form-group row">
    						<label for="inputPassword3" class="col-sm-2 col-form-label">Phone Number</label>
   						 <div class="col-sm-10">
     					 <input type="text" class="form-control" name="phone" placeholder="Enter customer phone number">
   						 </div>
  						</div>
  						<div class="form-group row">
    						<label for="inputPassword3" class="col-sm-2 col-form-label">E-mail</label>
    						<div class="col-sm-10">
     					 <input type="text" class="form-control" name="email"placeholder="Enter customer email address">
    					</div>
  							</div>
  							<div class="form-group row">
   						 <label for="inputPassword3" class="col-sm-2 col-form-label">Address</label>
   						 <div class="col-sm-10">
     					 <input type="text" class="form-control" name="address" placeholder="Enter customer physical address">
   						 </div>
 					 </div>
					  <div class="form-group row">
					    <div class="col-sm-10">
					      <button type="submit" class="btn btn-primary" name="submit">Add Customer</button>
					    </div>
					  </div>
				</form>
				</div>
			</div>
			<!-- End of row 2-->
			<div class="row">
				<div class="col-md-12">
					<p class="txt6">Copyright &copy 2019</p>
				</div>
			</div>
			<!-- End of row 3 -->
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html> 