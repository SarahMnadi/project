<?php
	include("session.php");
	if(!isset($_SESSION["UID"])){
		header("location:home.php");
	}
	include("config.php");
	if(isset($_POST["submit"])){
		$bcode = $_POST["bcode"];
		$title = $_POST["title"];
		$author = $_POST["author"];
		$publisher = $_POST["publisher"];
		$edition = $_POST["edition"];
		$price = $_POST["price"];
		$copies = $_POST["copies"];

		$db1 = "select B_Code from book where B_Code = '$bcode'";
		$result1 = mysqli_query($connection, $db1);
		$row = mysqli_num_rows($result1);

		if($row > 0){
			echo "Book is present";
		}else{
			$db = "INSERT INTO book(`B_Code`, `Title`, `Author`, `Edition`, `Publisher`, `Price`, `Copies`) VALUES ('$bcode','$title','$author','$publisher','$edition','$price','$copies')";
			$result = mysqli_query($connection, $db);
			if($result){
			echo "Book added";
			}
		}
	
	}	

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Add Books</title>
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
					<form action="addbooks.php" method="post">
						  <div class="form-group">
						    <label>Book Code</label>
						    <input type="text" class="form-control" required name="bcode" placeholder="Enter book ISBN">
						  </div>
						  <div class="form-group">
						    <label>Book Title</label>
						    <input type="text" class="form-control" required name="title"placeholder="Enter book title">
						  </div>
						  <div class="form-group">
						    <label>Book Author</label>
						    <input type="text" class="form-control" required name="author" placeholder="Enter author of the book">
						  </div>
						  <div class="form-group">
						    <label>Book Publisher</label>
						    <input type="text" class="form-control" required name="publisher" placeholder="Enter publisher of book">
						  </div>
						  <div class="form-group">
						    <label>Book Edition</label>
						    <input type="text" class="form-control" required name="edition"placeholder="Enter book edition">
						  </div>
						  <div class="form-group">
						    <label>Book Price</label>
						    <input type="text" class="form-control" required name="price" placeholder="Enter price for borrowing a book">
						  </div>
						  <div class="form-group">
						    <label>Number of Copies</label>
						    <input type="number" class="form-control" required name="copies" min="1" placeholder="Enter number of books in the library">
						  </div>
						  <button type="submit" class="btn btn-primary" name="submit">Add Book</button>
						  <button type="reset" class="btn btn-primary" >Reset</button>
					</form>
				</div>
			</div>
			<!-- End of row 2 -->
			<div class="row">
				<div class="col-md-12">
					<p class="txt5">Copyright &copy 2019</p>
				</div>
			</div>
			<!-- End of row 3 -->
		</div>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html> 