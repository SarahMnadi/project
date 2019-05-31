<?php
	include("session.php");
	if(!isset($_SESSION["UID"])){
		header("location:home.php");
	}
	include("config.php");
	$query = "select * from book";
	$result = mysqli_query($connection, $query);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>View Books</title>
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
					<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tr>
							<th>Book ISBN</th>
							<th>Book Title</th>
							<th>Book Author</th>
							<th>Book Publisher</th>
							<th>Book Edition</th>
							<th>Book Price</th>
							<th>Total Copies</th>
						</tr>
						<tr>
							<?php
							while($row = mysqli_fetch_assoc($result)){
							?>	
							<td><?php echo $row["B_Code"]; ?></td>
							<td><?php echo $row["Title"]; ?></td>
							<td><?php echo $row["Author"]; ?></td>
							<td><?php echo $row["Edition"]; ?></td>
							<td><?php echo $row["Publisher"]; ?></td>
							<td><?php echo $row["Price"]; ?></td>
							<td><?php echo $row["Copies"]; ?></td>
						</tr>
						<?php
						}
						?>	
					</table>
					</div>
				</div>
			</div>
			<!-- End of row 2 -->
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