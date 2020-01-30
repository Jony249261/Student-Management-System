<?php 
require_once"./dbcon.php";
?>

<?php 
	session_start();
	if (isset($_SESSION['user_login'])) {
	header('location:index.php');
}

if(isset($_POST['login'])){
	$username     = ($_POST['username']);
	$password    = ($_POST['password']);

	$username_check = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$username'");
	if(mysqli_num_rows($username_check )>0){
		$row = mysqli_fetch_assoc($username_check);
		if($row['password'] == md5($password)){
			if($row['status']=='active'){
				$_SESSION['user_login']=$username;
				header('location:index.php ');
			}else{
				$status_inactive = "Your Ststus is Inactive";
			}
		}else{
			$password_m = "Your password is Incorrect";
		}


	}else{
		$username_not_found = "This Username Doesn't Exist";
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://use.fontawesome.com/3b8062dda0.js"></script>
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container animated shake">
	<br>
	<a href="../index.php" class="btn btn-primary btn-block">Home</a>
	<h1 class="text-center">Student Management System</h1>

<div class="row ">
	<div class="col-sm-4 col-sm-offset-4 ">
		<h2 class="text-center ">Admin Login</h2>
	<label class="error"><?php if(isset($status_inactive)){
					echo $status_inactive ;
					} 
						?></label>
		<form action="login.php" method="post">
			<div>
				<label for="username">Username</label>
				<input class="form-control" id="username" type="text" name="username" required="" placeholder="Username" value="<?php if(isset($username)){echo $username;} ?>">
				<label class="error"><?php if(isset($username_not_found)){
					echo $username_not_found ;
					} 
						?></label>
			</div>
			<div>
				<label for="password">Password</label>
				<input class="form-control" id="password" type="password" name="password" required="" placeholder="Password"  value="<?php if(isset($password)){echo $password;} ?>">
				<label class="error"><?php if(isset($password_m)){
					echo $password_m ;
					} 
						?></label>
			</div>
			<div> <br>
				<input type="submit" name="login"  value="Submit" class="btn btn-success btn-block">
			</div>
			<div> <br>
				<a type="submit" name="login"  href="registration.php" class="btn btn-warning btn-block">Not a member? Click here</a>
			</div>
			<br>
		</form>
	</div>
</div>

</div>

</body>
</html>