<?php
session_start();
include "../model/user_model.php";
if(!isset($_SESSION['user_id'])){
    echo true;
    die;
}
$user_id = $_SESSION['user_id'];

$action = isset($_POST['action']) ? $_POST['action'] : "";
if($action === "add_to_cart"){
    $product_id = $_POST['id'];
    $check = $user_model->check_cart($user_id, $product_id);
    if(!$check){
        $add = $user_model->add_to_cart($user_id, $product_id);
        die;
    }
    $quantity = $user_model->check_quantity($user_id, $product_id);
    $newquantity = ++$quantity['quantity'];
    $user_model->update_quantity($newquantity, $user_id, $product_id);
}

if($action === "update_quantity"){
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    if($quantity){
        $result = $user_model->update_quantity($quantity, $user_id, $product_id);
    }else{
        $result = $user_model->del_from_cart($user_id, $product_id);
    }
    if($result){
        echo json_encode(["status"=> "success", "message" => "Quantity updated"]);
    }else{
        echo json_encode(["status"=> "success", "message" => "Quantity update failed"]);
    }
}

if($action === "delete_cart"){
    $product_id = $_POST['product_id'];
    $result = $user_model->del_from_cart($user_id, $product_id);
    if($result){
        echo json_encode(["status"=> "success", "message" => "Product deleted"]);
    }else{
        echo json_encode(["status"=> "success", "message" => "Failed to delete product."]);
    }
}
?>