<?php 
include_once("../model/admin_model.php");
if(isset($_POST['action'])){
        $action = $_POST['action'];
        if($action === "update"){
            $id = $_POST['id'];
            $name= $_POST['name'];
            $result = $admin_model->update_category($id, $name);
            if($result){
                echo json_encode(["status" => "success", "message" => "թարմացվեց"]);
            }else {
                echo json_encode(["status" => "error", "message" => "ձախողվեց"]);
            }
        }else if($action === "delete"){
            $id = $_POST['id'];
            $admin_model->delete_category($id);
        }
}

?>