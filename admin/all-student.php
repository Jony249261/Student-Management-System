<h1 class="text-primary"><i class="fa fa-users"></i> All Students <small>All Students</small></h1>
				<ol class="breadcrumb">
					<li><a href="index.php?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
  					<li class="active"><i class="fa fa-user-plus"></i> All Students</li>
				</ol>


			<div class="table-responsive">
				<table id="data" class="table table-hover table-bordered table-striped text-center">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Roll</th>
							<th>Class</th>
							<th>City</th>
							<th>Contact</th>
							<th>Photo</th>
							<th>Action</th>
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
							<td><?php echo $row['class']; ?></td>
							<td><?php echo ucwords($row['city']); ?></td>
							<td><?php echo $row['pcontact']; ?></td>
							<td><img src="student_images/<?php echo $row['photo']; ?>" alt="Image" style="width: 100Px;"></td>
							<td>
								<a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Update</a>
								&nbsp;&nbsp;
								<a href="delete_student.php?id=<?php echo base64_encode($row['id']); ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
							</td>
						</tr>

							<?php	
							}
						?>


					</tbody>
				</table>
			</div>