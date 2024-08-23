<?php
session_start();
if (!isset($_SESSION['users_id'])|| !$_SESSION['users_name']){
	header('location:login.php');
	exit();
}