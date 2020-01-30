<?php 
require_once"./dbcon.php";
?>

<?php 

session_start();

if(isset($_POST['registration'])){
	$name     = ($_POST['name']);
	$email    = ($_POST['email']);
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$c_password = ($_POST['c_password']);
	$photo    = ($_FILES['photo']['name']);

	$input_error=array();
	if(empty($name)){
	$input_error['name'] = "The name field is required";
}
if(empty($email)){
	$input_error['email'] = "The email field is required";
}
if(empty($username)){
	$input_error['username'] = "The username field is required";
}
if(empty($password)){
	$input_error['password'] = "The password field is required";
}
if(empty($c_password)){
	$input_error['c_password'] = "The c_password field is required";
}
if(count($input_error) == 0){


$email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';");
if (mysqli_num_rows($email_check)==0) {
	$username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';");
	if (mysqli_num_rows($username_check)==0){
		if(strlen($username)>7){
			if(strlen($password)>7){
				if($password == $c_password){
					$password = md5($password);
					$query = "INSERT INTO `users`( `name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo','inactive')";
					$result = mysqli_query($link,$query);
					if($result){
        $_SESSION['data_insert_success'] = "Data Insert Successfully!";

        move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
        header('location:registration.php');
    }else{
        $_SESSION['data_insert_error']="Data Insert Doesn't Successfully!";
    }


				}else{
					$password_m = "Password Doesn't Match";
				}
			}else{
				$password_l = "Password is More Than 8 Character or Number";
			}
		}else{
			$username_l = "Username is more than 8 character";
		}
	}else{
		$username_error = "Username is Already Exist";
	}
}else{
	$email_error = "Email is Already Exist";
}



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
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/animate.css">
</head>
<body>

<div class="container animate shake " style="margin-left: 300px; width: 900px">
	<br>
	<h1 class="">User Registration Form</h1>
	<hr>
		<?php 
             if(isset($_SESSION['data_insert_success'])){
             	echo '<div class="alert alert-success alert-dismissible" style="width:500px">'.$_SESSION['data_insert_success'];
             	?>
             	<button type="button" class="close" data-dismiss="alert">×</button>
             </div>
<?php 
             }
             
             if(isset($_SESSION['data_insert_error'])){
             	echo '<div class="alert alert-danger alert-dismissible">'.$_SESSION['data_insert_error'].'</div>';
             }

            ?>



<div class="row ">
	<div class="col-md-12">
		<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-1" for="name">Name</label>
				<div class="col-sm-4">
				<input id="name" type="text" name="name" placeholder="Enter Your Name" class="form-control" value="<?php if(isset($name)){echo $name;} ?>">
				</div>
				<label class="error"><?php if(isset($input_error['name'])){
					echo $input_error['name'];
					} 
						?>
					
				</label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="email">Email</label>
				<div class="col-sm-4">
				<input id="email" type="email" name="email" placeholder="Enter Your Email" class="form-control" value="<?php if(isset($email)){echo $email;} ?>">
				</div>
				<label class="error"><?php if(isset($input_error['email'])){
					echo $input_error['email'];
					} 
						?></label>
							<label class="error"><?php if(isset($email_error)){
					echo $email_error;
					} 
						?></label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="username">Username</label>
				<div class="col-sm-4">
				<input id="username" type="text" name="username" placeholder="Enter Your Username" class="form-control" value="<?php if(isset($username)){echo $username;} ?>">
				</div>
				<label class="error"><?php if(isset($input_error['username'])){
					echo $input_error['username'];
					} 
						?></label>
						<label class="error"><?php if(isset($username_error)){
					echo $username_error;
					} 
						?></label>
						<label class="error"><?php if(isset($username_l)){
					echo $username_l;
					} 
						?></label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="password">Password</label>
				<div class="col-sm-4">
				<input id="password" type="password" name="password" placeholder="Enter Your Password" class="form-control" value="<?php if(isset($password)){echo $password;} ?>">
				</div>
				<label class="error"><?php if(isset($input_error['password'])){
					echo $input_error['password'];
					} 
						?></label>
						<label class="error"><?php if(isset($password_l)){
					echo $password_l;
					} 
						?></label>

						
						 

			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="c_password">Conform Password</label>
				<div class="col-sm-4">
				<input id="c_password" type="password" name="c_password" placeholder="Enter Your Conforn Password" class="form-control" value="<?php if(isset($c_password)){echo $c_password;} ?>">
				</div>
				<label class="error"><?php if(isset($input_error['c_password'])){
					echo $input_error['c_password'];
					} 
						?></label>
							<label class="error"><?php if(isset($password_m)){
					echo $password_m;
					} 
						?></label>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-1" for="photo">Photo</label>
				<div class="col-sm-4">
				<input id="photo" type="file" name="photo" class="form-control" value="<?php if(isset($photo)){echo $photo;} ?>">
				</div>
			</div>
			<div class="col-sm-4">
				<input type="submit" name="registration" value="Registration" class="btn btn-success btn-block">
			</div><br>
			
			<br>
		</form>
		<div class="col-sm-4">
				<a class="btn btn-success btn-block" href="login.php">If You Already have a account</a>
			</div>
	</div>

</div>
</body>
</html>