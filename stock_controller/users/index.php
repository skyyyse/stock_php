<?php
include("../admin/php/connection.php");
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['page']) && is_numeric($_GET['page'])) {
        $current_page = (int)$_GET['page'];
    } else {
        $current_page = 1;
    }
    $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
    $search_condition = $search ? "WHERE name LIKE '%$search%'" : '';
    $row_page = 10;
    $start = ($current_page - 1) * $row_page;
    $users = $conn->query("select * from users $search_condition limit $start,$row_page");
    $total_records_query = $conn->query("SELECT *FROM users");
    $total_records = $total_records_query->num_rows;
    $total_pages = ceil($total_records / $row_page);
}
