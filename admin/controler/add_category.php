<?php
    session_start();
    include_once("../model/admin_model.php");
    if(!isset($_POST['add_category'])){
        die("File not found");
    }

    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    if(empty($name) || empty($image)){
        $_SESSION['error'] = "The value is empty";
    }else{
        $result = $admin_model->add_category($name, $image);
        if($result){
            $_SESSION['okay'] = "Category added successfully";
                    move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
        }else{
            $_SESSION['error'] = "failed to add";
        }
    }


    header("Location: ../view/home.php");
    die;
?>