<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/category/index.php' ?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include '../admin/include/header.php' ?>
		<?php include '../admin/include/sidebar.php' ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Create Sub Category</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="subcategory.php" class="btn btn-primary">Back</a>
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<form action="../admin/stock_controller/subcategory/function.php" method="post">
					<div class="container-fluid">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="mb-3">
											<label for="name">Category</label>
											<select name="category_id" class="form-control form-control-sm">
												<option value="">Select Option</option>
												<?php foreach ($category as $data) { ?>
													<option value="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Title</label>
											<input type="text" name="title"class="form-control form-control-sm" placeholder="Name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-3">
											<label for="email">Status</label>
											<select class="form-control form-control-sm  @error('product_type') form-control-danger @enderror" name="status">
												<option value="">Select Option</option>
												<option value="1">Enable</option>
												<option value="0">Disable</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button class="btn btn-primary" name="submit_action" value="store">Create</button>
							<a href="subcategory.php" class="btn btn-outline-dark ml-3">Cancel</a>
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