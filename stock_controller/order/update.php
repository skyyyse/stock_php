<?php include '../admin/stock_controller/users/index.php'?>
<div class="modal fade" id="order_update" tabindex="-1" aria-labelledby="order_update" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="http://localhost/php/admin/admin/stock_controller/order/function.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update Order
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="name">Customer</label>
                            <input type="text" class="form-control form-control-sm" name="customer" id="customer" placeholder="Customer" >
                        </div>
                        <div class="col-4">
                            <label for="name">Email</label>
                            <input type="text" class="form-control form-control-sm" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="col-4">
                            <label for="name">Phone</label>
                            <input type="hidden" class="form-control form-control-sm" name="id" id="order_id">
                            <input type="text" class="form-control form-control-sm" name="phone" id="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Create by</label>
                                <select class="form-control form-control-sm" name="create_by" id="create_by">
                                    <option value="">Select Gender</option>
                                    <?php foreach ($users as $user_data) { ?>
                                        <option value="<?php echo $user_data['id']?>"><?php echo $user_data['name']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Status</label>
                                <select class="form-control form-control-sm" name="status" id="status">
                                    <option value="">Select Role</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Close</a>
                    <button type="submit" name="submit_action" value="update"  class="btn btn-primary upload">
                        Save Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>








<script>
    $(document).ready(function() {
        $(document).on('click', '.order_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "http://localhost/php/admin/admin/stock_controller/order/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log('11111111');
                    console.log(response);
                    $("#customer").val(response.data[0].customer);
                    $("#email").val(response.data[0].email);
                    $("#phone").val(response.data[0].phone);
                    $("#gender").val(response.data[0].gender);
                    $("#status").val(response.data[0].status);
                    $("#order_id").val(response.data[0].id);
                    order(response.data[0].create_by);
                    function order(value) {
                        var selectElement = document.getElementById('create_by');
                        for (var i = 0; i < selectElement.options.length; i++) {
                            if (selectElement.options[i].value === value) {
                                selectElement.options[i].selected = true;
                                break;
                            }
                        }
                    }
                },
            });
        });
    });
</script>