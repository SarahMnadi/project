<?php
	include("session.php");
	if(!isset($_SESSION["UID"])){
		header("location:home.php");
	}
	include("config.php");
	$query = "select * from book";
	$result = mysqli_query($connection, $query);
	if(isset($_POST["send"])){
		$book = $_POST["bcode"];
		$client = $_POST["bissue"];
		$return = $_POST["return"];
		$status = "Issued";

		$query = "select B_Code from book where B_COde = '$book'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_fetch_assoc($result);
		echo $row["B_Code"];

		$query1 = "select U_ID from users where U_ID = '$client'";
		$result1 = mysqli_query($connection, $query1);
		$row1 = mysqli_fetch_assoc($result1);
		echo $row1["U_ID"];
		// echo $book;
		// echo "<br>";
		// echo $client;
		// echo "<br>";
		// echo $return;
		// echo "<br>";
		// echo $status;
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
							<li><a href="addbooks.php">Add Books</a></li>
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
						<form action="issuebook.php" method="post">
							<h1 class="issue">Issue a Book</h1>
							<h4>Book</h4>
						<select name="bcode" class="txt7">
							<?php
							while($row = mysqli_fetch_assoc($result)){
							?>
								<option value="<?php echo $row["B_Code"]; ?>"><?php echo "Book ISBN - ".$row["B_Code"]; echo "&nbsp&nbsp&nbsp&nbsp"; echo "Book Title - ".$row["Title"]; echo "&nbsp&nbsp&nbsp&nbsp"; echo "Book Author - ".$row["Author"]; ?></option>
							<?php		
							}
							?>
						</select>

							<h4>Customer</h4>
						<select name="bissue" class="txt7">
							<?php
							$query = "select * from users where user_type = 'Client'";
							$result = mysqli_query($connection, $query);
							while($row = mysqli_fetch_assoc($result)){
							?>
								<option value="<?php echo $row["U_ID"]; ?>"><?php echo "Customer ID - ".$row["U_ID"]; echo "&nbsp&nbsp&nbsp&nbsp"; echo "Name - ".$row["F_name"]." ".$row["L_name"]; ?></option>

							<?php		
							}
							?>
						</select>
						<h4>Return Date</h4>
						<input type="date" name="return" required><br><br>
						<input type="submit" value="Issue Book" name="send">
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