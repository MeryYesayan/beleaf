<?php
    session_start();
    include "../model/user_model.php";
    if(isset($_POST['action'])){
        if($_POST['action'] === "clear_cart"){
            $user_id = $_SESSION['user_id'];
            $result = $user_model->clear_cart($user_id);
            if($result){
                echo json_encode(["status" => "success", "message" => "Deleted"]);
            }else{
                echo json_encode(["status" => "error", "message" => "Failed"]);
            }
        }
    }
?>