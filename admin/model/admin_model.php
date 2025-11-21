<?php
class AdminModel{
    public $conn;
    public function __construct(){
        $this->conn = mysqli_connect("localhost", "root", "", "beleaf");
        if(!$this->conn){
            echo mysqli_connect_error();
            die;
        }
    }
    public function __destruct(){
        mysqli_close($this->conn);        
    }
    public function check_admin($login, $password){
        $query = "SELECT * FROM admin WHERE login = '$login' AND password = '$password'";
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    public function get_categories(){
        $query = "SELECT * FROM categories";
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    public function add_category($name, $image){
        $query = "INSERT INTO categories VALUES(NULL, '$name', '$image')";
        $res = mysqli_query($this->conn, $query);
        return $res; 
    }
    public function update_category($id, $name){
        $query = "UPDATE categories SET name = '$name' WHERE id = '$id'";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
    public function delete_category($id){
        $query = "DELETE FROM categories WHERE id = '$id'";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
    public function get_products($cat_id){
        $query = "SELECT * FROM products WHERE cat_id = '$cat_id'";
        $res = mysqli_query($this->conn, $query);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }
    public function add_product($name, $price, $desc, $image, $cat_id){
        $query = "INSERT INTO products VALUES(NULL, '$name', '$desc', '$price', '$image', '$cat_id')";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
    public function delete_product($id){
        $query = "DELETE FROM products WHERE id = '$id'";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
    public function update_product($id, $name, $desc ,$price, ){
        $query = "UPDATE products SET name = '$name', description = '$desc', price = '$price' WHERE id = '$id'";
        $res = mysqli_query($this->conn, $query);
        return $res;
    }
}

$admin_model = new AdminModel();
?>