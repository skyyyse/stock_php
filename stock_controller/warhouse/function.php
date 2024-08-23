<?php
include("../../php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["submit_action"]) {
        case "store": store($conn);break;
        case "update": update($conn); break;
        case "getdata": getdata($conn); break;
    }
}
function store($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $date = date('Y-m-d H:i:s');
        $title = $_POST['title'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $address = $_POST['address'];
        if ($title == null || $status == null || $location == null || $address == null) {
            echo '1111111';
        } else {
            $sql = $conn->query("insert into warhouse(`title`, `location`, `date`, `status`, `address`)values('$title','$location','$date','$status','$address')");
            if ($sql) {
                header("location:../../warhouse.php?error=Create Warhouse Sucessfull....");
                exit;
            }
        }
    }
}
function update($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $status = $_POST['status'];
        $location = $_POST['location'];
        $sql = $conn->query("update warhouse set `title`='$title',`status`='$status',`location`='$location' where id='$id' ");
        if ($sql) {
            header("location:../../warhouse.php?erroe=Update Warhouse Sucessfull....");
            exit;
        }
    }
}
function getdata($conn)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $warhouse = $conn->query("select * from warhouse where id='$id'");
        $data['data'] = $warhouse->fetch_assoc();
        echo json_encode($data);
    }
}
