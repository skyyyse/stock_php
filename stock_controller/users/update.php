<div class="modal fade" id="users_update" tabindex="-1" aria-labelledby="users_update" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="http://localhost/php/admin/admin/stock_controller/users/function.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="name">Users name</label>
                            <input type="text" class="form-control form-control-sm" name="name" placeholder="Name" id="name">
                        </div>
                        <div class="col-4">
                            <label for="name">Email</label>
                            <input type="text" class="form-control form-control-sm" name="email" placeholder="Email" id="email">
                        </div>
                        <div class="col-4">
                            <label for="name">Phone</label>
                            <input type="hidden" class="form-control form-control-sm" name="id" id="users_update_id">
                            <input type="text" class="form-control form-control-sm" name="phone"  id="phone" placeholder="Phone">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Gender</label>
                                <select class="form-control form-control-sm  @error('product_type') form-control-danger @enderror" name="gender" id="gender">
                                    <option value="">Select Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Role</label>
                                <select class="form-control form-control-sm  @error('role') form-control-danger @enderror" name="role" id="role">
                                    <option value="">Select Role</option>
                                    <option value="1">Admin</option>
                                    <option value="0">Users</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Status</label>
                                <select class="form-control form-control-sm  @error('status') form-control-danger @enderror" name="status" id="status">
                                    <option value="">Select Status</option>
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
        $(document).on('click', '.users_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "http://localhost/php/admin/admin/stock_controller/users/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log('11111111');
                    console.log(response);
                    $("#name").val(response.data.name);
                    $("#email").val(response.data.email);
                    $("#phone").val(response.data.phone);
                    $("#gender").val(response.data.gender);
                    $("#status").val(response.data.status);
                    $("#role").val(response.data.role);
                    $("#users_update_id").val(response.data.id);
                },
            });
        });
    });
</script>