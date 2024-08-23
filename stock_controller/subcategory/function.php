<?php   
include("../../php/connection.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    switch($_POST["submit_action"]){
        case "store":store($conn);break;
        case "delete":delete($conn);break;
        case "update":update($conn);break;
        case "getdata":getdata($conn);break;
        case "subcategory_id":subcategory_id($conn);break;
    }
}
function store($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $date = date('Y-m-d H:i:s');
        $title=$_POST['title'];
        $category_id=$_POST['category_id'];
        $status=$_POST['status'];
        $conn->query("INSERT INTO subcategory(`title`,`status`,`date`,`category_id`)values('$title','$status','$date','$category_id')");
        header('location:../../subcategory.php?error=Create Subcategories Sucessfull...');
        exit();
    }
}
function update($conn){
    if($_SERVER['REQUEST_METHOD']== 'POST'){
        $id=$_POST['id'];
        $title=$_POST['title'];
        $category=$_POST['category'];
        $status=$_POST['status'];
        $sql=$conn->query("update subcategory set `title`='$title',`category_id`='$category',`status`='$status' where id='$id'");
        if($sql){
            header('location:../../subcategory.php?error=Update Subcategories Sucessfull...');
            exit();
        }
    }
}
function delete($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST['id'];
        $conn->query("delete from subcategory where id='$id'");
        header('location:../../subcategory.php?error=Delete Subcategories Sucessfull...');
        exit();
    }
}
function getdata($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST['id'];
        $sql = $conn->query("select subcategory.*,categories.title as categories_title FROM subcategory join categories on categories.id=subcategory.category_id where subcategory.id='$id'");
        $data['data'][]=$sql->fetch_assoc();
        echo json_encode($data);
    }
}
function subcategory_id($conn){
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $id=$_POST['id'];
        $sql = $conn->query("SELECT * FROM `subcategory` where category_id='$id'");
        while($row = $sql->fetch_assoc()) {
            $data['data'][]= $row;
        }
        echo json_encode($data);
    }   
}