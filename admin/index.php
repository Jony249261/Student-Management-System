<?php 
session_start();
require_once 'dbcon.php';
$session_user = $_SESSION['user_login'];
if (!isset($_SESSION['user_login'])) {
	header('location:login.php');
}


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  	<link rel="stylesheet" type="text/css" href="../css/js/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/js/dataTables.bootstrap.min.css">
    <script type="text/javascript" src="../css/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../css/js/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../css/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../css/js/script.js"></script>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div class="">
    	<br>
    	<nav class="navbar navbar-default navbar-fixed-top nav-success">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Student Management System</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="# "><i class="fa fa-user"></i> Welcome: <?= $session_user?></a></li>
        <li><a href="registration.php"><i class="fa fa-user-plus"></i> Add User</a></li>
        <li><a href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a></li>
        <li><a href="logout.php "><i class="fa fa-power-off"></i> Logout</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    	
    </div>
    <br>
    <br>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3">
			<div class="list-group">
  <a href="index.php?page=dashboard" class="list-group-item active">
   <i class="fa fa-dashboard"></i> Dashbord
  </a>
  <a href="index.php?page=add-student" class="list-group-item"><i class="fa fa-user-plus"></i> Add Student</a>
  <a href="index.php?page=all-student" class="list-group-item"><i class="fa fa-users"></i> All Student</a>
  <a href="index.php?page=all-users" class="list-group-item"><i class="fa fa-users"></i> All Users</a>
</div>
		</div>
		<div class="col-sm-9">
			<div class="content">

<?php  
	if(isset($_GET['page'])){
		$page = $_GET['page'].'.php';
	}else{
		$page ="dashboard.php";
	}

if(file_exists($page)) {
	require_once $page;
}else{
	require_once '404.php';
}

?>
			</div>
		</div>
	</div>
</div>
<footer class="footer-area">
	<p>Copyright &COPY; 2020 Student Management System. All Right Are Reserved by Jony Islam</p>
</footer>

  </body>
</html>