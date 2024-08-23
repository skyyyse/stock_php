<?php
include("../../php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["submit_action"]) {
        case "store":
            store($conn);
            break;
        case "update":
            update($conn);
            break;
        case "delete":
            delete_data($conn);
            break;
        case "getdata":
            getdata($conn);
            break;
    }
}
function store($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = date('Y-m-d H:i:s');
        $title = $_POST['title'];
        $status = $_POST['status'];
        $sql=$conn->query("INSERT INTO categories(`title`,`status`,`date`)values('$title','$status','$date')");
        if($sql){
            header('location:../../categories.php?error=Create Categories sucessfull....');
            exit();
        }else{
            header('location:../../categories.php?error=Error');
            exit();
        }
    }
}
function update($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        $conn->query("update categories set `title`='$title',`status`='$status' where `id`='$id'");
        header('location:../../categories.php?erroe=Update Categories Sucessfulll...');
        exit();
    }
}
function delete_data($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $conn->query("delete from categories where id='$id'");
        header('location:../../categories.php?error=Delete Categories Sucessfull..');
        exit();
    }
}
function getdata($conn)
{
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = $_POST['id'];
        $sql=$conn->query("select * FROM categories where id='$id'");
        $data['data'][]=$sql->fetch_assoc();
        echo json_encode($data);
    }
}
