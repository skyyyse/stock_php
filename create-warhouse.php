<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/stock_controller/province/index.php' ?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include "../admin/include/header.php" ?>
        <?php include "../admin/include/sidebar.php" ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Warhouse</h1>
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
                <form action="../admin/stock_controller/warhouse/function.php" method="post">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Customer name</label>
                                                <input type="text" name="title" id="title" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Location</label>
                                                <select class="form-control form-control-sm" name="location" style="margin-top: 10px;">
                                                    <option value="">Select province</option>
                                                    <?php foreach ($province as  $data) { ?>
                                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['province_english'] ?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Status</label>
                                                <select class="form-control form-control-sm" name="status" style="margin-top: 10px;">
                                                    <option value="">Select Status</option>
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
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
                            <button class="btn btn-primary" type="submit" name="submit_action" value="store">Create</button>
                            <a href="order.php" class="btn btn-outline-dark ml-3">Cancel</a>
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