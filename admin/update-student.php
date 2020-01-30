

<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small>Update Student</small></h1>
				<ol class="breadcrumb">
					<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="index.php?page=all-student"><i class="fa fa-users"></i> All Student</a></li>
  					<li class="active"><i class="fa fa-pencil-square-o"></i> Update Student</li>
				</ol>

<?php 
	require_once 'dbcon.php';
	$id = base64_decode($_GET['id']);
	$db_data = mysqli_query($link,"SELECT * FROM `student_info` WHERE `id` = '$id'");
	$db_row = mysqli_fetch_assoc($db_data);

	if(isset($_POST['update-student'])){
		$name     = ($_POST['name']);
		$roll     = ($_POST['roll']);
		$city     = ($_POST['city']);
		$pcontact = ($_POST['pcontact']);
		$class    = ($_POST['class']);

		$query = "UPDATE `student_info` SET `name`='$name ',`roll`='$roll',`class`='$class',`city`='$city ',`pcontact`='$pcontact' WHERE `id` = '$id'";
		$result = mysqli_query($link,$query);
		if($result){
			header("location:index.php?page=all-student");
		}

	}


?>





<div class="row">
	<div class="col-sm-6">
		<form method="POST" action="" enctype="multipart/form-data">
			<div class="form-group">
				<label for="name">Student Name</label>
				<input type="text" id="name" name="name" placeholder="Student Name" class="form-control" required="" value="<?php echo $db_row['name'];?>">
			</div>
			<div class="form-group">
				<label for="roll">Roll</label>
				<input type="text" id="roll" name="roll" placeholder="Student Roll" class="form-control"pattern="[0-9]{6}" required="" value="<?php echo $db_row['roll'];?>">
			</div>
			<div class="form-group">
				<label for="city">City</label>
				<input type="text" id="city" name="city" placeholder="Student City" class="form-control" required="" value="<?php echo $db_row['city'];?>">
			</div>
			<div class="form-group">
				<label for="pcontact">Pcontact</label>
				<input type="text" id="pcontact" name="pcontact" placeholder="01********" class="form-control" required="" pattern="[0-9]{11}"  value="<?php echo $db_row['pcontact'];?>">
			</div>
			<div class="form-group">
				<label for="class">Student Class</label>
				<select id="class" name="class" class="form-control" required="">
					<option value="">Select</option>
					<option <?php echo $db_row['class']=='1st'?'selected=""':'';?> value="1st">1st</option>
					<option <?php echo $db_row['class']=='2nd'?'selected=""':'';?>  value="2nd">2nd</option>
					<option <?php echo $db_row['class']=='3rd'?'selected=""':'';?>  value="3rd">3rd</option>
					<option <?php echo $db_row['class']=='4th'?'selected=""':'';?>  value="4th">4th</option>
					<option <?php echo $db_row['class']=='5th'?'selected=""':'';?>  value="5th">5th</option>
				</select>
				
			</div>
			<div class="form-group">
				<input type="submit" value="Update Student" name="update-student" class="btn btn-success btn-block">
			</div>
		</form>
	</div>
</div>