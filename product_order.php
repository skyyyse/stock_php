<?php include '../admin/stock_controller/product/index.php' ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <div class="input-group input-group" style="width: 250px;">
                    <input type="text" id="searchInput" value="<?php echo htmlspecialchars($search); ?>" class="form-control float-right" placeholder="Search">
                    <div class="input-group-append">
                        <button type="button" id="searchButton" class="btn btn-default">
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
                        <th width="100">Select</th>
                        <th width="100">ID</th>
                        <th width="100">Image</th>
                        <th width="100">Product</th>
                        <th width="100">Price</th>
                        <th width="100">Quantity</th>
                        <th width="100">Status</th>
                        <th width="100">Pick</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (mysqli_num_rows($sql) > 0) { ?>
                        <?php
                        $row_number = $start + 1;
                        foreach ($sql as $data) { ?>
                            <tr>
                                <td><input type="checkbox" name="items[]" value="<?php echo $data['id']; ?>"></td>
                                <td><?php echo $row_number++ ?></td>
                                <td><img src="http://localhost/php/admin/admin/image/<?php echo $data['image'] ?>" class="img-thumbnail" width="50"></td>
                                <td><?php echo $data['title'] ?></td>
                                <td>$<?php echo  $data['price'] ?></td>
                                <td><?php echo $data['quantity']?></td>
                                <td>
                                    <svg class="<?php echo $data['status'] == 1 ? "text-success-500 h-6 w-6 text-success" : "text-danger h-6 w-6" ?>" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="<?php echo  $data['status'] == 1 ? "M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" : "M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" ?>"></path>
                                    </svg>
                                </td>
                                <td>
                                    <input type="number" name="quantities[<?php echo $data['id']; ?>]" class="form-control form-control-sm" placeholder="0">
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
        <?php include '../admin/stock_controller/product/number.php'?>
    </div>
</div>
<script>
    document.getElementById('searchButton').addEventListener('click', function() {
        var search = document.getElementById('searchInput').value;
        window.location.href = 'create-order.php?search=' + search;
    });
</script>