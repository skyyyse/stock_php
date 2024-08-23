<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/order/product_detail.php' ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../admin/include/header.php' ?>
        <?php include '../admin/include/sidebar.php' ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Order</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="order.php" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <?php foreach ($product_order as $data) { ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header pt-3">
                                        <div class="row invoice-info">
                                            <div class="col-sm-4 invoice-col">
                                                <h1 class="h5 mb-3">Shipping Address</h1>
                                                <address>
                                                    <strong>Name :<?php echo $data['customer'] ?></strong><br>
                                                    <strong>Location :<?php echo $data['province_english'] ?></strong><br>
                                                    <strong>Address :<?php echo $data['address'] ?></strong><br>
                                                    <strong>Phone :<?php echo $data['phone'] ?></strong><br>
                                                    <strong>Email :<?php echo $data['email'] ?></strong>

                                                    <br><br>
                                                    <b>Invoice #007612</b><br>
                                                    <b>Order ID: #<?php echo $data['order_id'] ?></b><br>
                                                    <b>Total : #</b> <span class="text-success sum_total_price" id="sum_total_price"></span><br>
                                                    <b>Status:</b> <span class="text-success">Delivered</span>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body table-responsive p-3">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th width="100">Price</th>
                                                    <th width="100">Quantity</th>
                                                    <th width="100">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (mysqli_num_rows($product_order) > 0) { ?>
                                                    <?php
                                                    foreach ($product_order as $data) { ?>
                                                        <tr>
                                                            <td><?php echo $data['title'] ?></td>
                                                            <td>$<?php echo $data['price'] ?></td>
                                                            <td><?php echo $data['quantity'] ?></td>
                                                            <td>$<?php echo $data['total_price'] ?></td>
                                                        </tr>
                                                        <?php $totalSum += $data['total_price'] ?>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <tr>
                                                        <td colspan="10">
                                                            <p style="display: flex;justify-content: center;align-items: center; margin-top:15px">No Record Found</p>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                            <p id="total_price" style="display: none;">$<?php echo number_format($totalSum, 2); ?></p>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
        </footer>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/adminlte.min.js"></script>
    <script src="js/demo.js"></script>
    <script>
            var total_price = document.getElementById('total_price').innerText;
            document.getElementById('sum_total_price').innerText = total_price;
    </script>
</body>

</html>