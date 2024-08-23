<div class="modal fade" id="changes_password" tabindex="-1" aria-labelledby="changes_password_label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="../admin/auth_controller/auth_controller.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="changes_password_label">Change Password</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="hidden" name="cryp" value="<?php echo  $_SESSION['users_password'] ?>">
                        <input type="hidden" name="id" value="<?php echo  $_SESSION['users_id'] ?>">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_action" value="changes_password">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>







<script>
    $(document).ready(function() {
        $(document).on('click', '.product_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "../admin/products/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log('11111111');
                    console.log(response);
                    // $("#name").val(response.data.name);
                    // $("#email").val(response.data.email);
                    // $("#phone").val(response.data.phone);
                    // $("#gender").val(response.data.gender);
                    // $("#status").val(response.data.status);
                    // $("#role").val(response.data.role);
                    // $("#users_update_id").val(response.data.id);
                },
            });
        });
    });
</script>