<?php 
include_once("../model/admin_model.php");
if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action === "update"){
            $id = $_POST['id'];
            $name= $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $result = $admin_model->update_product($id, $name, $desc, $price);
            if($result){
                echo json_encode(["status" => "success", "message" => "թարմացվեց"]);
            }else {
                echo json_encode(["status" => "error", "message" => "ձախողվեց"]);
            }
        }
}


?>