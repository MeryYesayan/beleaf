<?php 
    session_start();
    include("../model/admin_model.php");

    if(!isset($_POST['btn_add'])){
        die("File not found");
    }

    $name = $_POST['name'];
    $price = $_POST['price'];
    $desc = $_POST['desc'];
    $image = $_FILES['image']['name'];
    $cat_id = $_SESSION['cat_id'];
    if(empty($name) || empty($price) || empty($desc) || empty($image)){
        $_SESSION['error'] = "Please fill in all fields.";
        header("Location: ../view/products.php?cat_id=$cat_id");
        die;
    }

    $result = $admin_model->add_product($name, $price, $desc, $image, $cat_id);
    if($result){
        $_SESSION['okay'] = "Product added successfully";
        move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$image");
        header("Location: ../view/products.php?cat_id=$cat_id");
        die;
    }

    $_SESSION['error'] = "Failed";
        header("Location: ../view/products.php?cat_id=$cat_id");
        die;

        $action = isset($_POST['action']) ? $_POST['action'] : "";
    if($action = "delete_product"){
        $result = $admin_model->delete_product($_POST['id']);
        if($result){
            echo json_encode(['status' => "success", "message" => "okay"]);
        }else{
            echo json_encode(['status' => "error", "message" => "error"]);
        }
        die;
    }    
?>