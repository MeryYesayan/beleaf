<?php
session_start();
include_once("../model/admin_model.php");

if(!isset($_POST["btn_login"])){
    echo "File not found";
    die;
}

$login = $_POST['login'];
$password = $_POST['password'];
if(empty($login) || empty($password)){
    $_SESSION['error'] = "Login or password is not filled in.";
    header("Location:../view/login_form.php");
    die;
}

$admin = $admin_model->check_admin($login, $password);
if(!count($admin)){
    $_SESSION['error'] = "The login or password is incorrect.";
    header("Location:../view/login_form.php");
    die;
}
$_SESSION['admin_id'] = $admin[0]['id'];
header("Location:../view/home.php");
die;


?>