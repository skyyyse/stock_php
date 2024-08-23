<!DOCTYPE php>
<php lang="en">
    <?php include '../admin/include/head.php' ?>
    <?php include '../admin/stock_controller/order/index.php' ?>
    <?php include '../admin/stock_controller/product_order/index.php' ?>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php include "../admin/include/header.php" ?>
            <?php include "../admin/include/sidebar.php" ?>
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid my-2">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Orders</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="create-order.php" class="btn btn-primary">New Order</a>
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
                        <?php } ?>
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
                                            <th width="90">Orders Code</th>
                                            <th width="90">Customer</th>
                                            <th width="90">Email</th>
                                            <th width="90">Phone</th>
                                            <th width="90">Create By</th>
                                            <th width="90">Total</th>
                                            <th width="90">Status</th>
                                            <th width="90">Date Purchased</th>
                                            <th width="90">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($order) > 0) { ?>
                                            <?php
                                            $row_number = $start + 1;
                                            foreach ($order as $data) { ?>
                                                <tr>
                                                    <td>
                                                        <a href="order-detail.php" class="detail_product" data-id="<?php echo $data['orcode'] ?>"><?php echo $data['orcode'] ?></a>
                                                    </td>
                                                    <td><?php echo $data['customer'] ?></td>
                                                    <td><?php echo $data['email'] ?></td>
                                                    <td><?php echo $data['phone'] ?></td>
                                                    <td><?php echo $data['name'] ?></td>
                                                    <td>$<?php echo $data['total_price']; ?> </td>
                                                    <td>
                                                        <span class="<?php echo $data['status'] == 1 ? "badge bg-success" : "badge bg-danger" ?>"><?php echo $data['status'] == 1 ? "Delivered" : "Fales" ?></span>
                                                    </td>
                                                    <td><?php echo $data['date'] ?></td>
                                                    <td>
                                                        <button type="button" value="<?php echo $data['id'] ?>" class="btn btn-outline-secondary order_update" data-bs-toggle="modal" data-bs-target="#order_update">
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
                            <?php include '../admin/stock_controller/order/number.php' ?>
                        </div>
                    </div>
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
            $(document).ready(function() {
                $(document).on('click', '.detail_product', function(event) {
                    event.preventDefault();
                    var id = $(this).data('id');
                    window.location.href = 'order-detail.php?id=' + id;
                });
            });
        </script>
        <?php include '../admin/stock_controller/order/update.php' ?>
    </body>
</php>