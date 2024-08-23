<?php include '../admin/stock_controller/province/index.php' ?>
<div class="modal fade" id="warhouse_update" tabindex="-1" aria-labelledby="warhouse_update" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../admin/stock_controller/warhouse/function.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update information Warhouse
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <label for="name">Title</label>
                            <input type="hidden" class="form-control form-control-sm" name="id" id="update_id">
                            <input type="text" class="form-control form-control-sm" name="title" id="title">
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Location</label>
                                <select class="form-control form-control-sm" name="location" id="location">
                                    <option>Select Location</option>
                                    <?php foreach ($province as $province_data) { ?>
                                        <option value="<?php echo $province_data['id'] ?>"><?php echo $province_data['province_english'] ?></option>
                                    <?php } ?>
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
                    <button type="submit" name="submit_action" value="update" class="btn btn-primary upload">
                        Save Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>








<script>
    $(document).ready(function() {
        $(document).on('click', '.warhouse_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "../admin/stock_controller/warhouse/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log(response.data.id);
                    console.log(response);
                    $("#title").val(response.data.title);
                    $("#status").val(response.data.status);
                    $("#update_id").val(response.data.id);
                    warhouse(response.data.location);
                    function warhouse(value) {
                        var selectElement = document.getElementById('location');
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