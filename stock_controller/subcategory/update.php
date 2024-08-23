<?php include '../admin/stock_controller/category/index.php' ?>
<div class="modal fade" id="subcategory_update" tabindex="-1" aria-labelledby="fullscreeexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../admin/stock_controller/subcategory/function.php" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update Categories
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="name">Title</label>
                            <input type="hidden" class="form-control" name="id" id="category_id">
                            <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Name">
                        </div>
                        <div class="col-4">
                            <label for="school">Category</label>
                            <select class="form-control form-control-sm" name="category" id="category">
                                <option value="">Select Option</option>
                                <?php foreach($category as $data){?>
                                <option value="<?php echo $data['id']?>"><?php echo $data['title']?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="school">Status</label>
                            <select class="form-control form-control-sm" name="status" id="status">
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
        $(document).on('click', '.subcategory_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "../admin/stock_controller/subcategory/function.php",
                data: {
                    submit_action: 'getdata',
                    id: id
                },
                method: "post",
                dataType: 'json',
                success: function(response) {
                    console.log(response.data);
                    $("#title").val(response.data[0].title);
                    $("#status").val(response.data[0].status);
                    $("#category_id").val(response.data[0].id);
                    categories(response.data[0].category_id);
                    function categories(value) {
                        var selectElement = document.getElementById('category');
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