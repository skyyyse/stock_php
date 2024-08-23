<!DOCTYPE html>
<html lang="en">
<?php include '../admin/include/head.php' ?>
<?php include '../admin/province/index.php'?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../admin/include/header.php' ?>
        <?php include '../admin/include/sidebar.php' ?>
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid my-2">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Create Warhouse</h1>
                        </div>
                        <div class="col-sm-6 text-right">
                            <a href="pages.html" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </section>
            <section class="content">
                <form action="../admin/warhouse/function.php" method="post">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Title</label>
                                                <input type="text" name="title" id="title" style="margin-top: 10px;" class="form-control form-control-sm" placeholder="Title">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Status</label>
                                                <select class="form-control form-control-sm" name="status" style="margin-top: 10px;">
                                                    <option>Select Status</option>
                                                    <option value="1">Enable</option>
                                                    <option value="0">Disable</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label">Location</label>
                                                <select class="form-control form-control-sm" name="location" style="margin-top: 10px;">
                                                    <option>Select Location</option>
                                                    <?php foreach ($province as $province_data) { ?>
                                                        <option value="<?php echo $province_data['id'] ?>"><?php echo $province_data['province_english']?></option>
                                                    <?php } ?>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="content">Detail address</label>
                                            <textarea name="detail" id="detail" class="summernote" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pb-5 pt-3">
                            <button class="btn btn-primary" name="submit_action" value="store">Create</button>
                            <a href="warhouse.php" class="btn btn-outline-dark ml-3">Cancel</a>
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
    <script src="js/demo.js"></script>
    <script>
        $(function() {
            $('.summernote').summernote({
                height: '300px'
            });
        });
    </script>
</body>

</html>