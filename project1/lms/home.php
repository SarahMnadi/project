<?php
	include("session.php");
	include("config.php");
	if(isset($_POST["submit"])){
		$username = $_POST["username"];
		$password = SHA1($_POST["password"]);

		$query = "select U_ID, Password, user_type from users where U_ID = '$username' AND Password = '$password'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_num_rows($result);

		
		$row1 = mysqli_fetch_assoc($result);
		if(($row == 1) && ($row1["user_type"] == "Librarian")){
			$_SESSION["UID"] = $_POST["username"];
			header("location:viewbooks.php");
		}else if(($row == 1) && ($row1["user_type"] == "Admin")){
			$_SESSION["UID"] = $_POST["username"];
			header("location:viewusers.php");
		}else{
			echo "<p class='error1'>Incorrect User ID or Password</p>";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
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
				<div class="col-md-6">
					<p class="frm">Quote here ...</p>	
				</div>
				<div class="col-md-6">
					<form action="home.php" method="post" class="frm">
						  <div class="form-group">
						    <label>User ID</label>
						    <input type="text" required class="form-control" name="username" aria-describedby="emailHelp" placeholder="Enter your ID
						    ">
						  </div>
						  <div class="form-group">
						    <label>Password</label>
						    <input type="password" required class="form-control" name="password" placeholder="Password">
						  </div>
						  <button type="submit" class="btn btn-primary" name="submit">Login</button>
					</form>
				</div>
			</div>
			<!-- End of row 2-->
			<div class="row">
				<div class="col-md-12">
					<p class="text1">Copyright &copy 2019</p>
				</div>
			</div>
			<!-- End of row 3 -->
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html> 