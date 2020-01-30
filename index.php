<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://use.fontawesome.com/3b8062dda0.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="admin/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container bg-success">
	<br>
	<a class="btn btn-success pull-right" href="admin/login.php">Admin Login</a>
	<br>
	<br>
	<h1 class="text-center">Welcome to Student Management System</h1>
	
<div class="row ">
	<div class="col-sm-4 col-sm-offset-4">
		<form action="" method="post">
		<table class="table table-bordered">
		<tr>
			<td colspan="2" class="text-center"><label>Student Information</label></td>
		</tr>
		<tr>
			<td><label for="choose">Choose Class</label></td>
			<td>
				<select class="form-control" id="choose" name="choose">
					<option value="0">
						Select
					</option>
					<option value="1st">
						1st
					</option>
					<option value="2nd">
						2nd
					</option>
					<option value="3rd">
						3rd
					</option>
					<option value="4th">
						4th
					</option>
					<option value="5th">
						5th
					</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="roll">Roll</label></td>
			<td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll is 6 digit between 0 to 9"></td>
		</tr>
		<tr>
			<td colspan="2" class="text-center"><input class="btn btn-success" type="submit" name="show_info" value="Show Info"></td>
		</tr>
	</table>
	</form>
	</div>
</div>
<br>
<br>

<?php
require_once"admin/dbcon.php";
if(isset($_POST['show_info'])){

	$choose = $_POST['choose'];
	$roll = $_POST['roll'];
	$result = mysqli_query($link,"SELECT * FROM `student_info` WHERE `class` = '$choose' and `roll` = '$roll'");
	if(mysqli_num_rows($result)==1){
		$row = mysqli_fetch_assoc($result);
		?>

<div class="row">
	<div class="col-sm-8 col-sm-offset-2">
		<table class="table table-bordered table-striped">
			<tr>
				<td rowspan="5"><img src="admin/student_images/<?= $row['photo']; ?>" style="width:200px" class="img-thumbnail"></td>
				<td>Name</td>
				<td><?= ucwords($row['name']); ?></td>
			</tr>
			<tr>
				<td>Roll</td>
				<td><?= $row['roll']; ?></td>
			</tr>
			<tr>
				<td>Class</td>
				<td><?= $row['class']; ?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?= ucwords($row['city']); ?></td>
			</tr>
			<tr>
				<td>Parent Contact</td>
				<td><?= $row['pcontact']; ?></td>
			</tr>
		</table>
	</div>
</div>

		<?php
	}else{
		?>

		<script type="text/javascript">
			alert('Data Not Found');
		</script>


	<?php }} ?>





</div>

</body>
</html>