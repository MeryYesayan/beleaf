<?php 
    session_start();

    include_once("../model/user_model.php");

    if(!isset($_POST['reg_btn'])){
        die("False");
    }

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    if(empty($fullname) || empty($username) || empty($email) || empty($password) || empty($re_password)){
        $_SESSION['error'] = "Fill in all fields";
        header("location: ../view/register.php");
        die;
    }
    if(strlen($password) < 3){
        $_SESSION['error'] = "Password length cannot be less than 3";
        header("location: ../view/register.php");
        die;
    }
    if($password !== $re_password){
        $_SESSION['error'] = "Password does not match";
        header("location: ../view/register.php");
        die;
    }
    $check_email = $user_model->check_email($email);
    if($check_email > 0){
        $_SESSION['error'] = "The specified email is busy";
        header("location: ../view/register.php");
        die;
    }

    $check_user = $user_model->add_user($fullname, $username, $email, $password);
    if($check_user){
        header("location: ../view/login.php");
        die;
    }
    $_SESSION['error'] = "grancumy dzaxoxvec";
    header("location: ../view/register.php");
    die;

?>