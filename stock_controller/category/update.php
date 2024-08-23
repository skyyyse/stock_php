<div class="modal fade" id="category_update" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../admin/stock_controller/category/function.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update Categories
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 margin-bottom font-size-20">
                            <label for="name">Title</label>
                            <input type="hidden" class="form-control" name="id" id="category_id">
                            <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Name">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6 margin-bottom font-size-20">
                            <label for="school">Status</label>
                            <select class="form-control form-control-sm  @error('product_type') form-control-danger @enderror" name="status" id="status">
                                <option value="">Select Option</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:void(0);" class="btn btn-light" data-bs-dismiss="modal">Close</a>
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
        $(document).on('click', '.category_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "../admin/stock_controller/category/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log('11111111');
                    console.log(response);
                    $("#title").val(response.data[0].title);
                    $("#status").val(response.data[0].status);
                    $("#category_id").val(response.data[0].id);
                },
            });
        });
    });
</script>