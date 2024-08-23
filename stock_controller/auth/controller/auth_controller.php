<?php
include("C:/xampp/htdocs/php/admin/admin/php/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    switch ($_POST["submit_action"]) {
        case "login":
            login($conn);
            break;
        case "logout":
            logout();
            break;
        case "changes_password":
            changes_password($conn);
            break;
    }
}
function login($conn)
{
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = $conn->query("SELECT * FROM `users` WHERE email='$email'");
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            if ($row['role'] == 1) {
                $_SESSION['users_login'] = true;
                $_SESSION['users_id'] = $row['id'];
                $_SESSION['users_name'] = $row['name'];
                $_SESSION['users_email'] = $row['email'];
                $_SESSION['users_image'] = $row['image'];
                $_SESSION['users_password'] = $row['password'];
                header("location:http://localhost/php/admin/admin/index.php");
                exit();
            } else {
                header('location:http://localhost/php/admin/admin/login.php?error=You not is admin...?');
                exit();
            }
        } else {
            header('location:http://localhost/php/admin/admin/login.php?error=you wrong the password...?');
            exit();
        }
    }
}
function logout()
{
    session_start();
    session_unset();
    session_destroy();
    header("Location:http://localhost/php/admin/admin/login.php");
    exit();
}
function changes_password($conn)
{
    $id = $_POST['id'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $cryp = password_hash($new_password, PASSWORD_DEFAULT);
    if (password_verify($_POST['password'], $_POST['cryp'])) {
        if ($new_password != $confirm_password) {
            echo 'wrong the password';
        } else {
            $sql = $conn->query("update users set password='$cryp' where id='$id'");
            if ($sql) {
                header("location:http://localhost/php/admin/admin/index.php?error=Changes password is sucessfully......");
                exit();
            }
        }
    } else {
        header("location:http://localhost/php/admin/admin/index.php?error=Old password is wrong....");
        exit();
    }
}
