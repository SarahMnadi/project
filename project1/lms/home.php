<?php
	include("session.php");
	include("config.php");
	if(isset($_POST["sign"])){
		$username = $_POST["username"];
		$password = SHA1($_POST["password"]);

		$query = "select U_ID, Password, user_type from users where U_ID = '$username' AND Password = '$password'";
		$result = mysqli_query($connection, $query);
		$row = mysqli_num_rows($result);

		$row1 = mysqli_fetch_assoc($result);
		if(($row == 1) && ($row1["user_type"] == "Librarian")){
			$_SESSION["UID"] = $_POST["username"];
			header("location:librarian/viewbooks.php");
		}else if(($row == 1) && ($row1["user_type"] == "Admin")){
			$_SESSION["UID"] = $_POST["username"];
			header("location:admin/viewusers.php");
		}else{
			echo "<p class='error1'>Incorrect User ID or Password</p>";
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Login</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Library Management System</h1>
      </div>
      <div class="login-box">
        <form class="login-form"  method="post" action="home.php">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USER_ID</label>
            <input class="form-control" type="text" placeholder="User_Id" name="username" required>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" name="password" required>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
              </div>
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"  name="sign"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
          </div>
		</form>
		<!--
        <form class="forget-form" action="home.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-3">
            <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>-->
      </div>
    </section> 
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script>
  </body>
</html>