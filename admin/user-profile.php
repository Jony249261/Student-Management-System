<h1 class="text-primary"><i class="fa fa-users"></i> Profile <small>Profile</small></h1>
				<ol class="breadcrumb">
					<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  					<li class="active"><i class="fa fa-user"></i> Profile</li>
				</ol>

<?php 
	require_once"./dbcon.php";
	$session_user = $_SESSION['user_login'];
	$user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$session_user'");
	$user_row  = mysqli_fetch_assoc($user_data);
?>





<div class="row">
	<div class="col-sm-6">
		<table class="table table-bordered">
			<tr>
				<td>User Id</td>
				<td><?= $user_row['id']; ?></td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?php echo ucwords($user_row['name']); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $user_row['username']; ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $user_row['email']; ?></td>
			</tr>
			<tr>
				<td>Status</td>
				<td><?php echo ucwords($user_row['status']); ?></td>
			</tr>
			<tr>
				<td>Signup Date</td>
				<td><?php echo $user_row['datetime']; ?></td>
			</tr>
		</table>
		<a href="index.php?page=update-profile&id=<?php echo base64_encode($user_row['id']); ?>" class="btn btn-primary pull-right ">Edit Profile</a>
		
	</div>
	<div class="col-sm-6">
		<a href="">
			<img src="images/<?php echo $user_row['photo']; ?>" style="width: 250px;" class="img-thumbnail">
		</a>
		<br><br>

		<?php  
		if(isset($_POST['upload'])){
			$photo  = explode('.', ($_FILES['photo']['name']));
		    $photo  = end($photo);
		    $photo_name  = $session_user.'.'.$photo;
		    $upload = mysqli_query($link,"UPDATE `users` SET `photo`='$photo_name' WHERE `username` = '$session_user'");
		    if ($upload) {
		    	move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo_name);
		    }


		}

		?>



		<form action="" enctype="multipart/form-data" method="POST">
			<label for="photo">Profile Picture</label>
			<input type="file" name="photo" required=""><br>
			<input type="submit" name="upload" value="Upload" class="btn btn-success btn-sm">
		</form>
	</div>
</div>