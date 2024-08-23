<?php 
include("../admin/php/connection.php");
if($_SERVER["REQUEST_METHOD"]=="GET"){
    $province=$conn->query("select * from province ");
}