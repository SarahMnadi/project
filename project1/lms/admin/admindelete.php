<?php
	include("../session.php");
	if(!isset($_SESSION["UID"])){
		header("location: ../home.php");
	}
	include("../config.php");
	if (isset($_POST['submit'])) {
		$query = "delete from users where U_ID = '" .$_POST['U_ID']. "'";
		$result = mysqli_query($connection, $query);
		header('refresh:0 url=viewusers.php');
		echo "User has been deleted";
	}else{
		?>
		<center><p><b>Are you sure you want to delete this user?</b></p></center>
		<form method="post" action="admindelete.php">
        <div class="form-group">
          <input type="hidden" name="U_ID" value="<?php echo $_GET['U_ID']; ?>" class="form-control">
        </div>
        <div class="form-group">
          <center><input type="submit" name="submit" value="Yes" class="form-control">
          <input type="button" value="No" onclick="history.go(-1);" class="form-control"></center>
        </div>
      </form>
      <?php
	}
?>