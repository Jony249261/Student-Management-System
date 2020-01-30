				<h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small>Statics Overview</small></h1>
				<ol class="breadcrumb">
  					<li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
				</ol>
<?php 
$count_student = mysqli_query($link,"SELECT * FROM `student_info`");
$total_student = mysqli_num_rows($count_student);

?>
<?php 
$count_user = mysqli_query($link,"SELECT * FROM `users`");
$total_user = mysqli_num_rows($count_user);

?>
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9">
										<div class="pull-right" style="font-size: 45px">
											<?php echo $total_student; ?>
										</div>
										<div class="clearfix"></div>
										<div class="pull-right">
											All Student
										</div>
									</div>
								</div>
							</div>
							<a href="index.php?page=all-student">
								<div class="panel-footer">
								<span class="pull-left">All Students</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
							</div> 
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
										<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-users fa-5x"></i>
									</div>
									<div class="col-xs-9">
										<div class="pull-right" style="font-size: 45px">
											<?php echo $total_user; ?>
										</div>
										<div class="clearfix"></div>
										<div class="pull-right">
											All Users
										</div>
									</div>
								</div>
							</div>
							<a href="index.php?page=all-users">
								<div class="panel-footer">
								<span class="pull-left">All Users</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-o-right"></i></span>
							</div> 
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<hr/>
				<h3>New Student</h3>
			<div class="table-responsive">
				<table id="data" class="table table-hover table-bordered table-striped text-center">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Roll</th>
							<th>City</th>
							<th>Contact</th>
							<th>Photo</th>
						</tr>
					</thead>
					<tbody>

						<?php
							$db_sinfo = mysqli_query($link, "SELECT * FROM `student_info`");
							
							while ($row = mysqli_fetch_assoc($db_sinfo)) {?>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo ucwords($row['name']); ?></td>
							<td><?php echo $row['roll']; ?></td>
							<td><?php echo ucwords($row['city']); ?></td>
							<td><?php echo $row['pcontact']; ?></td>
							<td><img src="student_images/<?php echo $row['photo']; ?>" alt="Image" style="width: 100Px;"></td>
						</tr>

							<?php	
							}
						?>


					</tbody>
				</table>
			</div>
