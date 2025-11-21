<?php
session_start();
include "../model/user_model.php";
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$action = isset($_POST['action']) ? $_POST['action'] : "";
if ($action === "buy_item") {
    $id = $_POST['id'];
    $quantity = $_POST['quantity'];
    $result = $user_model->add_single_order($user_id, $id, $quantity);
    if ($result) {
        echo json_encode(["status" => "success", "message" => "The order was placed"]);
        $user_model->del_from_cart($user_id, $id);
    } else {
        echo json_encode(["status" => "error", "message" => "Order failed"]);
    }
}

if($action === "buy_all"){
    $result = $user_model->add_order($user_id);

    if ($result) {
        echo json_encode(["status" => "success", "message" => "The order was placed"]);
        $user_model->clear_cart($user_id);
    } else {
        echo json_encode(["status" => "error", "message" => "Order failed"]);
    }
}