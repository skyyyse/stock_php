<?php include '../admin/stock_controller/warhouse/index.php'?>
<div class="modal fade" id="product_update" tabindex="-1" aria-labelledby="product_update" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="../admin/stock_controller/product/function.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="fullscreeexampleModalLabel">
                        Update information
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="name">Title</label>
                            <input type="text" class="form-control form-control-sm" name="title" id="title" placeholder="Title">
                        </div>
                        <div class="col-4">
                            <label for="name">Price</label>
                            <input type="text" class="form-control form-control-sm" name="price" id="price" placeholder="Price">
                        </div>
                        <div class="col-4">
                            <label for="name">Quantity</label>
                            <input type="hidden" class="form-control form-control-sm" name="id" id="update_id">
                            <input type="text" class="form-control form-control-sm" name="quantity" id="quantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Warhouse</label>
                                <select class="form-control form-control-sm" name="sku" id="sku">
                                    <option value="">Select Warhouse</option>
                                    <?php foreach($warhouse as $data){?>
                                        <option><?php echo $data['title']?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Status</label>
                                <select class="form-control form-control-sm  @error('status') form-control-danger @enderror" name="status" id="status">
                                    <option value="">Select Role</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="email">Image</label>
                                <input type="file" name="image" id="fileInput" onchange="showImagePreview(this)" class="form-control form-control-sm @error('image')border-danger  @enderror" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="mb-12 col-md-12" id="imagePreview" style="display: none;">
                            <div class="card-body card mb-0 shadow-none border mb-3 col-12">
                                <img src="#" alt="image" id="uploadedImage" class="me-3" style="border-radius: 10px;height: 250px; width:500px">
                                <h5 class="mb-1 mt-1" id="imageName"></h5>
                            </div>
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
        $(document).on('click', '.product_update', function() {
            var id = $(this).val();
            $.ajax({
                url: "../admin/stock_controller/product/function.php",
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
                    $("#price").val(response.data[0].price);
                    $("#quantity").val(response.data[0].quantity);
                    $("#stock").val(response.data[0].stock);
                    $("#status").val(response.data[0].status);
                    $("#update_id").val(response.data[0].id);
                    // $("#users_update_id").val(response.data.id);
                },
            });
        });
    });

    function showImagePreview(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
            imageName.textContent = input.files[0].name;
            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }
    }
</script>