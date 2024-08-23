<div class="card-footer clearfix">
    <ul class="pagination pagination m-0 float-right">
        <li class="page-item">
            <?php if ($current_page > 1) { ?>
                <a class="page-link" href="?page=<?php echo $current_page - 1; ?>">«</a>
            <?php } else { ?>
                <span class="page-link disabled">«</span>
            <?php } ?>
        </li>
        <li class="page-item">
            <?php
            $start_page = max(1, $current_page - 5);
            $end_page = min($total_pages, $current_page + 5);
            if ($end_page - $start_page < 9) {
                if ($start_page > 1) {
                    $end_page = min($total_pages, $start_page + 9);
                } else {
                    $start_page = max(1, $end_page - 9);
                }
            }
            ?>
            <?php for ($i = $start_page; $i <= $end_page; $i++) { ?>
                <?php if ($i == $current_page) { ?>
        <li class="page-item">
            <span class="page-link"><?php echo $i ?></span>
        </li>

    <?php } else { ?>
        <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php } ?>
<?php } ?>
<li class="page-item">
    <?php if ($current_page < $total_pages) { ?>
        <a class="page-link" href="?page=<?php echo $current_page + 1; ?>">»</a>
    <?php } else { ?>
        <span class="page-link disabled">»</span>
    <?php } ?>
</li>
    </ul>
</div>