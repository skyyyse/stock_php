<?php
include("C:/xampp/htdocs/php/admin/admin/php/connection.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    switch ($_POST["submit_action"]) {
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
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];
        $role = $_POST['role'];
        $status = $_POST['status'];
        $address = $_POST['address'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        if($name==null||$email==null||$phone==null||$gender==null||$role==null||$status==null||$address==null||$password==null||$confirm_password==null){
            header("location:http://localhost/php/admin/admin/users.php?error=All field is nor empty...?");
            exit;
        }else{
            if ($password != $confirm_password) {
                header("http://localhost/php/admin/admin/users.php?error=You wrong the password...?");
                exit;
            } else {
                $sql = $conn->query("SELECT * FROM users WHERE `email`='$email'");
                if (mysqli_num_rows($sql) > 0) {
                    header('location:http://localhost/php/admin/admin/users.php?error=Email is Already...?');
                    exit();
                } else {
                    $cryp_password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = $conn->query("INSERT INTO users(`name`,`email`,`phone`,`gender`,`role`,`status`,`password`,`address`,`date`)values('$name','$email','$phone','$gender','$role','$status','$cryp_password','$address','$date')");
                    header("location:http://localhost/php/admin/admin/users.php?error=Create user sucessfull..");
                    exit;
                }
            }
        }
    }
}
function delete_data($conn)
{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST['id'];
        $sql = $conn->query("delete from users where id='$id'");
        if ($sql) {
            header("location:http://localhost/php/admin/admin/users.php?error=Delect user sucessfull..");
            exit;
        }
    }
}
function update($conn)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $role = $_POST['role'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    $conn->query("update users set `name`='$name',`email`='$email',`phone`='$phone',`gender`='$gender',`role`='$role',`status`='$status' where `id`='$id'");
    header("location:http://localhost/php/admin/admin/users.php?error=Update user sucessfull..");
    exit;
}
function getdata($conn)
{
    $id=$_POST['id'];
    $sql = $conn->query("select * from users where id='$id'");
    $data['data']= $sql->fetch_assoc();
    echo json_encode($data);
}
