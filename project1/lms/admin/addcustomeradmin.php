<?php
	include("../session.php");
	if(!isset($_SESSION["UID"])){
		header("location: ../home.php");
	}
	include("../config.php");
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
			echo "<script>alert('Customer added')</script>";
			}else{
				echo "error ".mysqli_error($connection);
			}
		}
	
	}	

	?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>Admin Add Customers</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!-- Font-icon css-->
    
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	

		</head>


  <body class="app sidebar-mini rtl">
    <!-- Navbar-->

    <header class="app-header"><a class="app-header__logo" href="index.html">Library management</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
		
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
    </li>

				
        <!--Notification Menu-->
       <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li> 
        -->
      
			
         <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="page-login.html"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>


		
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>

		<p style="text-align:center;font-size:20px;margin-top:50px;color:black">welcome admin to the system </p>  
          
					<div class="sarah" style="margin-left: 350px; width: 860px">
            <h5 style="text-align: center">Add Customer</h5>
            <form action ="addcustomeradmin.php" method="post">
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
     					 <input type="text" class="form-control" name="phone" placeholder="Enter phone number">
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
					      <button type="submit" class="btn btn-primary" name="submit" id="y">Add Customer</button>
					    </div>
					  </div>
				</form>
				</div>
			</div>
			</div>
			</div>
		
		
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image.jpg" alt="User Image" width="80px">
        <div>
        
          <p class="app-sidebar__user-name">Admin</p>
          <p class="app-sidebar__user-designation">UDSM Library</p>
        </div>
      </div>

    <aside>
        <ul>
            	<li><a class="treeview-item" href="addbooksadmin.php"><i class="icon fa fa-circle-o">Add Books</a></li>
              <li><a class="treeview-item" href="addlibrarian.php"><i class="icon fa fa-circle-o">Add Librarian</a></li>
							<li><a class="treeview-item" href="addcustomeradmin.php"><i class="icon fa fa-circle-o">Add Customers</a></li>
							<li><a class="treeview-item" href="adminbooks.php"><i class="icon fa fa-circle-o">View Books</a></li>
							<li><a class="treeview-item"href="adminissue.php"><i class="icon fa fa-circle-o">Issue Books</a></li>
							<li><a class="treeview-item"href="adminviewissue.php"><i class="icon fa fa-circle-o">View Issued Books</a></li>
							<li><a class="treeview-item" href="viewusers.php"><i class="icon fa fa-circle-o">View Users</a></li>
							<li><a class="treeview-item"href="../logout.php"><i class="icon fa fa-circle-o">Logout</a>
            </li>
						</ul>
            </aside>
	</body>
</html> 