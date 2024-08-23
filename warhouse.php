<!DOCTYPE php>
<php lang="en">
    <?php include '../admin/include/head.php' ?>
    <?php include '../admin/stock_controller/warhouse/index.php' ?>
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
                                <h1>Warhouse</h1>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a href="create-warhouse.php" class="btn btn-primary">New Warhouse</a>
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
                                            <th width="150">ID</th>
                                            <th width="150">Title</th>
                                            <th width="150">Location</th>
                                            <th width="150">Status</th>
                                            <th width="150">Date</th>
                                            <th width="150">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (mysqli_num_rows($warhouse) > 0) { ?>
                                            <?php
                                            $row_number = $start + 1;
                                            foreach ($warhouse as $data) { ?>
                                                <tr>
                                                    <td><?php echo $row_number++?></td>
                                                    <td>
                                                        <a href="#" class="detail_product" data-id="<?php echo $data['id'] ?>"><?php echo $data['title'] ?></a>
                                                    </td>
                                                    <td><?php echo $data['province_english'] ?></td>
                                                    <td>
                                                        <span class="<?php echo $data['status'] == 1 ? "badge bg-success" : "badge bg-danger" ?>"><?php echo $data['status'] == 1 ? "Delivered" : "Fales" ?></span>
                                                    </td>
                                                    <td><?php echo $data['date'] ?></td>
                                                    <td>
                                                        <button type="button" value="<?php echo $data['id'] ?>" class="btn btn-outline-secondary warhouse_update" data-bs-toggle="modal" data-bs-target="#warhouse_update">
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
                            <?php include '../admin/stock_controller/warhouse/number.php' ?>
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
                    window.location.href = 'warhouse-product.php?id=' + id;
                });
            });
        </script>
        <?php include '../admin/stock_controller/warhouse/update.php' ?>
    </body>
</php>