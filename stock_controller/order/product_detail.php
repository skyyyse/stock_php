<?php
include("C:/xampp/htdocs/php/admin/admin/php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $product_order = $conn->query("SELECT * FROM `order` JOIN product_order on `order`.orcode=product_order.order_id join province on province.id=`order`.location where product_order.order_id='$id'");
    $totalSum = 0;
}
