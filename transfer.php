<!DOCTYPE php>
<php lang="en">
	<?php include '../admin/include/head.php'?>
	<body class="hold-transition sidebar-mini">
		<div class="wrapper">
		<?php include '../admin/include/header.php'?>
		<?php include '../admin/include/sidebar.php'?>
			<div class="content-wrapper">
				<section class="content-header">					
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Orders</h1>
							</div>
							<div class="col-sm-6 text-right">
							</div>
						</div>
					</div>
				</section>
				<section class="content">
					<div class="container-fluid">
						<div class="card">
							<div class="card-header">
								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
					
										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>
								</div>
							</div>
							<div class="card-body table-responsive p-0">								
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th>Orders #</th>											
                                            <th>Customer</th>
                                            <th>Email</th>
                                            <th>Phone</th>
											<th>Status</th>
                                            <th>Total</th>
                                            <th>Date Purchased</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
                                            <td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
										<tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
                                        <tr>
											<td><a href="order-detail.php">OR756374</a></td>
											<td>Mohit Singh</td>
                                            <td>example@example.com</td>
											<td>12345678</td>
                                            <td>
												<span class="badge bg-success">Delivered</span>
											</td>
											<td>$400</td>
                                            <td>Nov 20, 2022</td>																				
										</tr>
									</tbody>
								</table>										
							</div>
							<div class="card-footer clearfix">
								<ul class="pagination pagination m-0 float-right">
								  <li class="page-item"><a class="page-link" href="#">«</a></li>
								  <li class="page-item"><a class="page-link" href="#">1</a></li>
								  <li class="page-item"><a class="page-link" href="#">2</a></li>
								  <li class="page-item"><a class="page-link" href="#">3</a></li>
								  <li class="page-item"><a class="page-link" href="#">»</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<footer class="main-footer">
				
				<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
			</footer>
			
		</div>
		<!-- ./wrapper -->
		<!-- jQuery -->
		<script src="plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- AdminLTE App -->
		<script src="js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="js/demo.js"></script>
	</body>
</php>