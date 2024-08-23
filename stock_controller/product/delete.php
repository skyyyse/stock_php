<div class="modal fade" id="product_delete" tabindex="-1" aria-labelledby="product_delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="http://localhost/php/admin/admin/stock_controller/product/function.php" method="post">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>are you want to delete ?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="delete_id" name="id">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit_action" value="delete" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on('click', '.product_delete', function() {
            var id = $(this).val();
            const id_delete=document.getElementById('delete_id').value=id;
        });
    });
</script>