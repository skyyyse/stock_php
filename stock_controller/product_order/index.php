<?php
include("../admin/php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $product_order = $conn->query("SELECT * FROM `product_order`");
    $total_sum = 0;
}
