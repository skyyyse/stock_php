<!DOCTYPE php>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/dashboard/dashboard.php'?>
<?php include '../admin/stock_controller/auth/view/changes_password.php'?>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		 <?php include "../admin/include/header.php"?>
		 <?php include "../admin/include/sidebar.php" ?>
		<div class="content-wrapper">
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1>Dashboard</h1>
						</div>
						<div class="col-sm-6">
						</div>
					</div>
				</div>
			</section>
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-4 col-6">
							<div class="small-box card">
								<div class="inner">
									<h3><?php echo $num_order?></h3>
									<p>Total Orders</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="small-box card">
								<div class="inner">
									<h3><?php echo $num_users?></h3>
									<p>Total Customers</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="#" class="small-box-footer text-dark">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>

						<div class="col-lg-4 col-6">
							<div class="small-box card">
								<div class="inner">
									<h3>$<?php echo $num_total?></h3>
									<p>Total Sale</p>
								</div>
								<div class="icon">
									<i class="ion ion-person-add"></i>
								</div>
								<a href="javascript:void(0);" class="small-box-footer">&nbsp;</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<footer class="main-footer">
			<strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
		</footer>
	</div>
	<?php include "../admin/include/footer.php"?>
</body>

</html>