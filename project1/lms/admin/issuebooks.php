<?php
	include("../config.php");
	$query = "select * from book";
	$result = mysqli_query($connection, $query);
	if(isset($_POST["send"])){
		$book = $_POST["bcode"];
		$client = $_POST["bissue"];
		$return = $_POST["return"];
		$status = "Issued";
		echo $book;
		echo "<br>";
		echo $client;
		echo "<br>";
		echo $return;
		echo "<br>";
		echo $status;
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Issue Book</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
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

		<h4>Client</h4>
	<select name="bissue" class="txt7">
		<?php
		$query = "select * from users where user_type = 'Client'";
		$result = mysqli_query($connection, $query);
		while($row = mysqli_fetch_assoc($result)){
		?>
			<option value="<?php echo $row["U_ID"]; ?>"><?php echo "Client ID - ".$row["U_ID"]; echo "&nbsp&nbsp&nbsp&nbsp"; echo "Name - ".$row["F_name"]." ".$row["L_name"]; ?></option>

		<?php		
		}
		?>
	</select>
	<h4>Return Date</h4>
	<input type="date" name="return" required><br><br>
	<input type="submit" value="Issue Book" name="send">
</form>
</body>
</html>