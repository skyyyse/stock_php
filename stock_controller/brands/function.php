<?php
include("../../php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST['submit_action']) {
        case "store":
            store($conn);
            break;
        case "delete":
            delete_data($conn);
            break;
        case "update":
            update($conn);
            break;
        case "getdata":getdata($conn);break;
    }
}
function store($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = date('Y-m-d H:i:s');
        $title = $_POST['title'];
        $status = $_POST['status'];
        $conn->query("insert into brands(`title`,`status`,`date`)values('$title','$status','$date')");
        header('location:../../brands.php?error=Create Brands Sucessfull.....');
        exit();
    }
}
function delete_data($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $conn->query("delete from brands where id='$id'");
        header('location:../../brands.php?error=Delete Brands Sucessfull.....');
        exit();
    }
}
function update($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $id = $_POST['brands_id'];
        $conn->query("update brands set `title`='$title',`status`='$status'where `id`='$id'");
        header('location:../../brands.php?error=Update Brands Sucessfull.....');
        exit();
    }
}
function getdata($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $sql = $conn->query("select * from brands  where id='$id'");
        $data['data'][] = $sql->fetch_assoc();
        echo json_encode($data);
    }
}
