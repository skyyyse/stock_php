<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include "../admin/include/header.php" ?>
		<?php include "../admin/include/sidebar.php" ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Create User</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="users.php" class="btn btn-primary">Back</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<?php if (isset($_GET['error'])) { ?>
						<div class="alert alert-danger card" role="alert">
							<?php echo $_GET['error']; ?>
						</div>
					<?php } else { ?>
						<p></p>
					<?php } ?>
				</div>
			</section>
			<section class="content">
				<form action="http://localhost/php/admin/admin/stock_controller/users/function.php" method="post">
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-3">
										<div class="mb-3">
											<label">Name</label>
												<input type="text" name="name" id="name" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Name">
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Email</label>
												<input type="text" name="email" id="email" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Email">
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Phone</label>
												<input type="text" name="phone" id="phone" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Phone">
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Gender</label>
												<select class="form-control form-control-sm  @error('gender') form-control-danger @enderror" name="gender" style="margin-top: 10px;">
													<option>Select Gender</option>
													<option>Male</option>
													<option>Female</option>
												</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<div class="mb-3">
											<label">Role</label>
												<select class="form-control form-control-sm  @error('role') form-control-danger @enderror" name="role" style="margin-top: 10px;">
													<option value="">Select Role</option>
													<option value="1">Admin</option>
													<option value="0">User</option>
												</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Status</label>
												<select class="form-control form-control-sm  @error('status') form-control-danger @enderror" name="status" style="margin-top: 10px;">
													<option value="">Select Role</option>
													<option value="1">Enable</option>
													<option value="0">Disable</option>
												</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Password</label>
												<input type="password" name="password" id="password" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Password">
										</div>
									</div>
									<div class="col-md-3">
										<div class="mb-3">
											<label">Confirm Password</label>
												<input type="password" name="confirm_password" id="confirm_password" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Confirm Password">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
											<label>Address</label>
											<textarea name="address" id="address" class="form-control form-control-sm" cols="30" rows="5"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button class="btn btn-primary" name="submit_action" value="store">Create</button>
							<a href="users.php" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
				</form>
			</section>
		</div>
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
		</footer>

	</div>
	<?php include '../admin/include/footer.php' ?>
</body>

</html>