<?php
    session_start();
    include("../model/user_model.php");
    if(!isset($_POST['login_btn'])){
        die("An error occurred");
    }
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $_SESSION['error'] = "Fill in all fields";
        header("location: ../view/login.php");
        die;
    }

    $user = $user_model->check_user($email, $password);
    if($user){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header("location: ../../index.php");
        die;
    }
    $_SESSION['error'] = "The email or password is incorrect";
    header("location: ../view/login.php");
    
?>