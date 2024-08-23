<?php
$conn = new mysqli("localhost", "root", "", "example_stock");
if ($conn->connect_error) {
    die("" .$conn->connect_error);
}
