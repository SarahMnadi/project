<?php
	include("session.php");
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
			$db = "INSERT INTO book(`B_Code`, `Title`, `Author`, `Edition`, `Publisher`, `Price`, `Copies`,`available`) VALUES ('$bcode','$title','$author','$publisher','$edition','$price','$copies','$copies')";
			$result = mysqli_query($connection, $db);
			if($result){
			echo "Book added";
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
    <title>Blank Page - Vali Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	

		</head>


  <body class="app sidebar-mini rtl">
    <!-- Navbar-->

    <header class="app-header"><a class="app-header__logo" href="viewbooks.php">Library management</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
		
      <ul class="app-nav">
        <li class="app-search">
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

		<p style="text-align:center;font-size:20px;margin-top:30px;color:black"  >welcome librarian to the system </p>  

		<div class="sarah" style="float:right">
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
			</div>
		</div>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="image.jpg" alt="User Image" width="80px">
        <div>
        
          <p class="app-sidebar__user-name">Librarian</p>
          <p class="app-sidebar__user-designation">UDSM Library</p>
        </div>
      </div>

    <aside>
        <ul>
            	<li><a class="treeview-item" href="addbooks.php"><i class="icon fa fa-circle-o">Add Books</a></li>
							<li><a class="treeview-item" href="addcustomers.php"><i class="icon fa fa-circle-o">Add Customers</a></li>
							<li><a class="treeview-item" href="viewbooks.php"><i class="icon fa fa-circle-o">View Books</a></li>
							<li><a class="treeview-item"href="issuebook.php"><i class="icon fa fa-circle-o">Issue Books</a></li>
							<li><a class="treeview-item"href="viewissuedbooks.php"><i class="icon fa fa-circle-o">View Issued Books</a></li>
							<li><a class="treeview-item" href="viewcustomers.php"><i class="icon fa fa-circle-o">View Customers</a></li>
							<li><a class="treeview-item"href="logout.php"><i class="icon fa fa-circle-o">Logout</a>
            </li>
						</ul>
            </aside>
	</body>
</html> 