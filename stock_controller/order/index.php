<?php
include("../admin/php/connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = (int)$_GET['page'];
    } else {
        $current_page = 1;
    }
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
    $search_condition = $search ? "WHERE `order`.`orcode` LIKE '%$search%'" : '';
    $row_page = 10;
    $start = ($current_page - 1) * $row_page;
    $order = $conn->query("SELECT `order`.*, COALESCE(SUM(product_order.total_price), 0) AS total_price, users.name FROM `order` LEFT JOIN  `product_order`  ON `order`.orcode = product_order.order_id JOIN users ON users.id=`order`.create_by  $search_condition GROUP BY `order`.orcode limit $start,$row_page");
    $total_records_query = $conn->query("SELECT *from `order`");
    $total_records = $total_records_query->num_rows;
    $total_pages = ceil($total_records / $row_page);
}
