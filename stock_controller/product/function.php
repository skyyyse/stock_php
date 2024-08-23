<?php
include("../../php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['submit_action']) {
        case 'store':
            store($conn);
            break;
        case 'delete':
            delete_data($conn);
            break;
        case 'update':
            update($conn);
            break;
        case 'getdata':
            getdata($conn);
            break;
    }
}
function store($conn)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $date = date('Y-m-d H:i:s');
        $title = $_POST['title'];
        $description = $_POST['description'];
        $status = $_POST['status'];
        $category = $_POST['category'];
        $sub_category = $_POST['sub_category'];
        $brand = $_POST['brand'];
        $featured_product = $_POST['featured_product'];
        $price = $_POST['price'];
        $compare_price = $_POST['compare_price'];
        $barcode = $_POST['barcode'];
        $qty = $_POST['qty'];
        $stock = $_POST['stock'];
        if ($title == null || $description == null || $status == null || $category == null || $sub_category == null || $brand == null || $featured_product == null || $price == null || $compare_price == null || $barcode == null || $qty == null||$stock==null) {
            header("location:../../create-product.php?error=All field is nor empty...?");
            exit;
        } else {
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                $file = $_FILES["image"];
                $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $imageName = bin2hex(random_bytes(20)) . '.' . $fileExtension;
                $targetDirectory = 'C:/xampp/htdocs/php/admin/admin/image/product/';
                $targetPath = $targetDirectory . $imageName;
                if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $rest="INSERT INTO products(`title`, `description`, `status`, `category_id`, `subcategory_id`, `brand_id`, `featured_product`, `image`, `price`, `compare_price`, `barcode`, `quantity`, `date`, `stock`) VALUES ('$title','$description','$status','$category','$sub_category','$brand','$featured_product','$imageName','$price','$compare_price','$barcode','$qty','$date','$stock')";
                    $sql=$conn->query($rest);
                    if($sql){
                        header("location:../../products.php?error=Create product sucessfully....?");
                        exit;   
                    }
                } else {
                    header('Location: ../../create-product.php?error=Failed to insert file information into database:.....');
                    exit();
                }
            } else {
                header('Location: ../../create-product.php?error=Failed to insert file information into database:.....');
                exit();
            }
        }
    }
}

function delete_data($conn)
{
    $id = $_POST['id'];
    $sql = $conn->query("SELECT * FROM products WHERE id='$id'");
    if ($sql) {
        $data = $sql->fetch_assoc();
        $targetDirectory = 'C:/xampp/htdocs/php/admin/admin/image/product/';
        $fileName = $data['image'];
        $targetPath = $targetDirectory . $fileName;
        if (file_exists($targetPath)) {
            if (unlink($targetPath)) {
                $conn->query("DELETE FROM products WHERE id='$id'");
                header('Location:../../products.php?error=Delete product successful...');
                exit();
            } else {
                header('Location:../../products.php?error=Failed to delete the file.....');
                exit();
            }
        } else {
            header('Location:../../products.php?error=Delete product successful...');
            exit();
        }
    } else {
        header('Location:../../products.php?error=Failed to execute query....');
        exit();
    }
}
function update($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $sku = $_POST['sku'];
        $status = $_POST['status'];
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $data = $conn->query("select *from products where id='$id'")->fetch_assoc();
            $targetDirectory = 'C:/xampp/htdocs/php/admin/admin/image/product/';
            $fileName = $data['image'];
            $targetPath = $targetDirectory . $fileName;
            if (file_exists($targetPath)) {
                if (unlink($targetPath)) {
                    echo '1111111111';

                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK) {
                        $file = $_FILES["image"];
                        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
                        $imageName = bin2hex(random_bytes(20)) . '.' . $fileExtension;
                        $targetDirectory = 'C:/xampp/htdocs/php/admin/admin/image/product/';
                        $targetPath = $targetDirectory . $imageName;
                        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                            $sql =  $conn->query("update products set `title`='$title',`price`='$price',`quantity`='$quantity',`stock`='$sku',`status`='s=$status',`image`='$imageName' where `id`='$id'");
                            if ($sql) {
                                header('Location: ../../products.php?error=Update products sucessfulll....');
                                exit();
                            } else {
                                header('Location: ../../products.php?error=Failed to insert file information into database:.....');
                                exit();
                            }
                        } else {
                            header('Location: ../../products.php?error=Failed to insert file information into database:.....');
                            exit();
                        }
                    } else {
                        header('Location: ../../products.php?error=Failed to insert file information into database:.....');
                        exit();
                    }
                } else {
                    header('Location: ../../products.php?error=Failed to insert file information into database:.....');
                    exit();
                }
            } else {
                header('Location: ../../products.php?error=Failed to insert file information into database:.....');
                exit();
            }
        } else {
            $conn->query("update products set `title`='$title',`price`='$price',`quantity`='$quantity',`stock`='$sku',`status`='s=$status' where `id`='$id'");
            header('Location: ../../products.php?error=Update products sucessfulll....');
            exit();
        }
    }
}

function getdata($conn)
{
    $id = $_POST['id'];
    $sql = $conn->query("select *from products where id='$id'");
    if ($sql) {
        $data['data'][] = $sql->fetch_assoc();
        echo json_encode($data);
    }
}
