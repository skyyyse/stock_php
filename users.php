<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/users/index.php' ?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include "../admin/include/header.php" ?>
		<?php include "../admin/include/sidebar.php" ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Users</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="create-user.php" class="btn btn-primary">New User</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-success card" role="alert">
							<?php echo $_GET['error']; ?>
						</div>
					<?php }?>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="card">
						<div class="card-header">
							<div class="card-tools">
								<form class="input-group input-group" style="width: 250px;" method="get">
									<input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" class="form-control float-right" placeholder="Search">
									<div class="input-group-append">
										<button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										</button>
									</div>
								</form>
							</div>
						</div>
						<div class="card-body table-responsive p-0">
							<table class="table table-hover text-nowrap">
								<thead>
									<tr>
										<th width="60">ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Role</th>
										<th>Phone</th>
										<th>Gender</th>
										<th width="100">Status</th>
										<th width="100">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php if (mysqli_num_rows($users) > 0) { ?>
										<?php
										$row_number = $start + 1;
										foreach ($users as $data) { ?>
											<tr>
												<td><?php echo $row_number++ ?></td>
												<td><?php echo $data['name'] ?></td>
												<td><?php echo $data['email'] ?></td>
												<td><?php echo $data['role']==1?"Admin":"is Not Admin" ?></td>
												<td><?php echo $data['phone'] ?></td>
												<td><?php echo $data['gender'] ?></td>
												<td>
													<svg class="<?php echo $data['status'] == 1 ? "text-success-500 h-6 w-6 text-success" : "text-danger h-6 w-6" ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
														<path stroke-linecap="round" stroke-linejoin="round" d="<?php echo  $data['status'] == 1 ? "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" : "M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" ?>"></path>
													</svg>
												</td>
												<td>
													<button type="button" value="<?php echo $data['id'] ?>" class="btn btn-outline-danger users_delete" data-bs-toggle="modal" data-bs-target="#users_delete">
														Delete
													</button>
													<button type="button" value="<?php echo $data['id'] ?>" class="btn btn-outline-secondary users_update" data-bs-toggle="modal" data-bs-target="#users_update">
														Update
													</button>
												</td>
											</tr>
										<?php } ?>
									<?php } else { ?>
										<tr>
											<td colspan="10">
												<p style="display: flex;justify-content: center;align-items: center; margin-top:15px">No Record Found</p>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<?php include '../admin/stock_controller/users/number.php'?>
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
		</footer>
	</div>
	<?php include '../admin/include/footer.php' ?>
	<?php include '../admin/stock_controller/users/update.php'?>
	<?php include '../admin/stock_controller/users/delete.php'?>
</body>
</html>