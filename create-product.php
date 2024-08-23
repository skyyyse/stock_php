<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/brands/index.php' ?>
<?php include '../admin/stock_controller/category/index.php' ?>
<?php include '../admin/stock_controller/warhouses/index.php' ?>

<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<?php include '../admin/include/header.php' ?>
		<?php include '../admin/include/sidebar.php' ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid my-2">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Create Product</h1>
						</div>
						<div class="col-sm-6 text-right">
							<a href="products.php" class="btn btn-primary">Back</a>
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
				<form action="../admin/stock_controller/product/function.php" method="post" enctype="multipart/form-data">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8">
								<div class="card mb-3">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12">
												<div class="mb-3">
													<label for="title">Title</label>
													<input type="text" name="title" id="title" class="form-control" placeholder="Title">
												</div>
											</div>
											<div class="col-md-12">
												<div class="mb-3">
													<label for="description">Description</label>
													<textarea name="description" id="description" cols="30" rows="10" class="summernote" placeholder="Description"></textarea>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card mb-3">
									<div class="card-body">
										<h2 class="h4 mb-3">Pricing</h2>
										<div class="row">
											<div class="col-md-12">
												<div class="mb-3">
													<label for="price">Price</label>
													<input type="text" name="price" id="price" class="form-control" placeholder="Price">
												</div>
											</div>
											<div class="col-md-12">
												<div class="mb-3">
													<label for="compare_price">Compare at Price</label>
													<input type="text" name="compare_price" id="compare_price" class="form-control" placeholder="Compare Price">
													<p class="text-muted mt-3">
														To show a reduced price, move the product’s original price into Compare at price. Enter a lower value into Price.
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card mb-3">
									<div class="card-body">
										<h2 class="h4 mb-3">Inventory</h2>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label for="sku">Stock Keeping Unit</label>
													<select name="stock" class="form-control">
														<option value="">Select Warhouse</option>
														<?php foreach ($warhouse as $data) { ?>
															<option value="<?php echo $data['id'] ?>"><?php echo $data['title'] . "" . $data['id'] ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label for="barcode">Barcode</label>
													<input type="text" name="barcode" id="barcode" class="form-control form-control-sm" placeholder="Barcode">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="mb-3">
													<label for="sku">Track Quantity</label>
													<input type="text" name="qty" id="qty" class="form-control form-control-sm" placeholder="Qty">
												</div>
											</div>
											<div class="col-md-6">
												<div class="mb-3">
													<label for="exampleInputEmail1" class="form-label">Image</label>
													<input type="file" name="image" id="fileInput" onchange="showImagePreview(this)" class="form-control form-control-sm @error('image')border-danger  @enderror" aria-describedby="emailHelp">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card mb-3">
									<div class="card-body">
										<h2 class="h4 mb-3">Product status</h2>
										<div class="mb-3">
											<select name="status" id="status" class="form-control">
												<option value="1">Active</option>
												<option value="0">Block</option>
											</select>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<h2 class="h4  mb-3">Product category</h2>
										<div class="mb-3">
											<label for="category">Category</label>
											<select name="category" id="category" class="form-control">
												<option value="">Select Category</option>
												<?php foreach ($category as $data) { ?>
													<option value="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="mb-3">
											<label for="category">Sub category</label>
											<select name="sub_category" id="sub_category" class="form-control">
												<option value="">Select SubCateory</option>
											</select>
										</div>
									</div>
								</div>
								<div class="card mb-3">
									<div class="card-body">
										<h2 class="h4 mb-3">Product brand</h2>
										<div class="mb-3">
											<select name="brand" id="brand" class="form-control">
												<option value="">Select Brands</option>
												<?php foreach ($sql as $data) { ?>
													<option value="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
								</div>
								<div class="card mb-3">
									<div class="card-body">
										<h2 class="h4 mb-3">Featured product</h2>
										<div class="mb-3">
											<select name="featured_product" id="featured_product" class="form-control">
												<option value="0">No</option>
												<option value="1">Yes</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row g-2">
									<div class="mb-12 col-md-12" id="imagePreview" style="display: none;">
										<div class="card-body card mb-0 shadow-none border mb-3 col-12">
											<img src="#" alt="image" id="uploadedImage" class="me-3" style="border-radius: 10px;height: 250px; width:500px">
											<h5 class="mb-1 mt-1" id="imageName"></h5>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button class="btn btn-primary" name="submit_action" value="store">Create</button>
							<a href="products.php" class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
					</div>
				</form>
			</section>
		</div>
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
		</footer>
	</div>
	<script src="plugins/jquery/jquery.min.js"></script>
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="js/adminlte.min.js"></script>
	<script src="plugins/summernote/summernote-bs4.min.js"></script>
	<script src="plugins/dropzone/dropzone.js"></script>
	<script src="js/demo.js"></script>
	<script>
		Dropzone.autoDiscover = false;
		$(function() {
			$('.summernote').summernote({
				height: '300px'
			});
			const dropzone = $("#image").dropzone({
				url: "create-product.html",
				maxFiles: 5,
				addRemoveLinks: true,
				acceptedFiles: "image/jpeg,image/png,image/gif",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
				},
				success: function(file, response) {
					$("#image_id").val(response.id);
				}
			});
		});

		function showImagePreview(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					uploadedImage.src = e.target.result;
				};
				reader.readAsDataURL(input.files[0]);
				imageName.textContent = input.files[0].name;
				imagePreview.style.display = 'block';
			} else {
				imagePreview.style.display = 'none';
			}
		}
		$("#category").change(function() {
			var id = $(this).val();
			console.log(id);
			$.ajax({
				url: "http://localhost/php/admin/admin/stock_controller/subcategory/function.php",
				data: {
					submit_action: 'subcategory_id',
					id: id
				},
				method: "post",
				dataType: 'json',
				success: function(response) {
					console.log(response);
					console.log(response);
					$('#sub_category').find("option").not(":first").remove();
					$.each(response['data'], function(key, item) {
						$('#sub_category').append(`<option value='${item.id}'>${item.title}</option>`)
					});
				},
			});
		});
	</script>
</body>

</html>