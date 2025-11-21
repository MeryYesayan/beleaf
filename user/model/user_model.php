<?php 
    class Model{
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
        public function check_email($email){
            $query = "SELECT * FROM users WHERE email = '$email'";
            $res = $this->conn->query($query);
            return $res->num_rows;
        }
        public function add_user($fullname, $username, $email, $password){
            // $query = "INSERT INTO users VALUES(NULL, '$fullname', '$username', '$email', '$password')";
            // $res = $this->conn->query($query);
            // return $res;

            $query = "INSERT INTO users(fullname, username, email, password) VALUES(?, ?, ?, ?)";
            $res = mysqli_prepare($this->conn, $query);
            mysqli_stmt_bind_param($res, "ssss", $fullname, $username, $email, $password);
            return mysqli_execute($res);
        }
        public function check_user($email, $password){
            $query = "SELECT * FROM users WHERE email = ? AND password = ? ";
            $res = $this->conn->prepare($query);
            $res->bind_param("ss", $email, $password);
            mysqli_execute($res);
            $result = $res->get_result();
            return $result->fetch_assoc();
        }
        public function get_categories(){
            $query = "SELECT * FROM categories";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        public function get_products($cat_id){
            $query = "SELECT * FROM products WHERE cat_id = '$cat_id'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        public function check_cart($user_id, $product_id){
            $query = "SELECT * FROM cart WHERE user_id ='$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_assoc($res);
        }
        public function add_to_cart($user_id, $product_id){
            $quantity = 1;
            $query = "INSERT INTO cart VALUES(NULL, '$user_id', '$product_id', '$quantity')";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }
        public function check_quantity($user_id, $product_id){
            $query = "SELECT quantity FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_assoc($res);
        }
        public function update_quantity($quantity, $user_id, $product_id){
            $query = "UPDATE cart SET quantity = '$quantity' WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }
        public function get_cart_items($user_id){
            $query = "SELECT * FROM cart JOIN  products ON cart.product_id = products.id WHERE cart.user_id = '$user_id'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }
        public function del_from_cart($user_id, $product_id){
            $query = "DELETE FROM cart WHERE user_id = '$user_id' AND product_id = '$product_id'";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }
        public function add_single_order($user_id, $product_id, $quantity){
            $today = date("Y-m-d");
            $query = "INSERT INTO orders VALUES(NULL,'$user_id', '$product_id', '$quantity','$today')";
            $res = mysqli_query($this->conn, $query);
            return $res;
        }
        public  function clear_cart($user_id){
            $query = "DELETE FROM cart WHERE user_id = ?";
            $res = $this->conn->prepare($query);
            $res->bind_param("i", $user_id);
            if($res->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function add_order($user_id){
            $today = date("Y-m-d");
            $query = "SELECT * FROM cart WHERE user_id = ?";
            $res = $this->conn->prepare($query);
            $res->bind_param("i", $user_id);
            $res->execute();
            $result = $res->get_result();
            $cart = $result->fetch_all(MYSQLI_ASSOC);
            $queryOrd = "INSERT INTO orders(user_id, prod_id, quantity, created_at) VALUES(?,?,?,?) ";
            $res_stmt = $this->conn->prepare($queryOrd);
            foreach($cart as $item){
                $prod_id = $item['product_id'];
                $quantity = $item['quantity'];
                $res_stmt->bind_param("iiis", $user_id, $prod_id, $quantity, $today);
                $res_stmt->execute();
            }
            return true;
        }
        public function get_orders($user_id){
            $query = "SELECT ord.*, prod.* FROM orders AS ord LEFT JOIN products AS prod ON ord.prod_id = prod.id WHERE ord.user_id='$user_id'";
            $res = mysqli_query($this->conn, $query);
            return mysqli_fetch_all($res, MYSQLI_ASSOC);
        }

    }

    $user_model = new Model();
?>