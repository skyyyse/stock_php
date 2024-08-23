<?php
include("../admin/php/connection.php");
if($_SERVER['REQUEST_METHOD']=="GET"){
    $sql=$conn->query("select  id from users;");
    $order=$conn->query("SELECT `id`  FROM `order`");
    $total_price=$conn->query("SELECT sum(total_price) as total_price FROM `product_order`")->fetch_assoc();
    $num_total=number_format($total_price['total_price'], 2); 
    $num_users=$sql->num_rows;
    $num_order=$order->num_rows;
}