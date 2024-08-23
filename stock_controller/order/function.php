<?php
$data;
include("C:/xampp/htdocs/php/admin/admin/php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["submit_action"]) {
        case "store":  store($conn);break;
        case "update":update($conn);break;
        case "getdata":getdata($conn);break;
    }
}
function store($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = date('Y-m-d H:i:s');
        $datetime = new DateTime($date);
        $orcode = 'OR' . $datetime->format('YmdHis');
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $create_by = $_POST['create_by'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        echo $create_by;
        if ($name == null || $email == null || $phone == null || $create_by == null || $status == null || $location == null || $address == null) {
            header("location:http://localhost/php/admin/admin/create-order.php");
            exit;
        } else {
            $conn->query("INSERT INTO `order`(`date`,`customer`,`email`,`phone`,`status`,`create_by`,`location`,`address`,`orcode`)values('$date','$name','$email','$phone','$status','$create_by','$location','$address','$orcode')");
            if (isset($_POST['items']) && isset($_POST['quantities'])) {
                $items = $_POST['items'];
                $quantities = $_POST['quantities'];
                foreach ($items as $item_id) {
                    $quantity = isset($quantities[$item_id]) ? intval($quantities[$item_id]) : 0;
                    if ($quantity > 0) {
                        $sql = $conn->query("SELECT * FROM products WHERE id = '$item_id'");
                        $item = $sql->fetch_assoc();
                        if ($item) {
                            if ($quantity <= $item['quantity']) {
                                $title = $item['title'];
                                $price = $item['price'];
                                $total_price = $price * $quantity;
                                $sql = $conn->query("INSERT INTO product_order (order_id,title,price,total_price,quantity) VALUES ('$orcode','$title','$price','$total_price','$quantity')");
                                $new_quantity = $item['quantity'] - $quantity;
                                $conn->query("UPDATE products SET quantity = '$new_quantity' WHERE id = '$item_id'");
                                header("location:http://localhost/php/admin/admin/order.php?error=Create order sucessfull....");
                            } else {
                                echo "Not enough quantity for item ID: $item_id.<br>";
                            }
                        }
                    }
                }
            } else {
                // header("location:http://localhost/php/admin/admin/create-order.php");
                // exit;
            }
        }
    }
}
function update($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST['id'];
        $customer=$_POST['customer'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $create_by=$_POST['create_by'];
        $status=$_POST['status'];
        echo $id;
        $sql=$conn->query("UPDATE `order` SET `customer`='$customer',`email`='$email',`phone`='$phone',`create_by`='$create_by',`status`='$status'  WHERE id ='$id'");
        if($sql){
            header("location:http://localhost/php/admin/admin/order.php?error=Update order Sucessfull.....");
            exit();
        }
    }
}
function getdata($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $sql=$conn->query("SELECT `order`.*, COALESCE(SUM(product_order.total_price), 0) AS total_price, users.name FROM `order` LEFT JOIN  `product_order`  ON `order`.orcode = product_order.order_id JOIN users ON users.id=`order`.create_by   GROUP BY `order`.orcode");
        $data['data'][]=$sql->fetch_assoc();
        echo json_encode($data);
    }
}