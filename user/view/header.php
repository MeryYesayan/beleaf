<?php
    function create_url($path){
        $basUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/beleaf/user/view/";
        return $basUrl . $path;
    }
    $array = [
        "Home" =>  $basUrl = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/beleaf/index.php",
    ];
    if(isset($_SESSION['user_id'])){
        $array['Cart'] = create_url("cart.php");
        $array['Orders'] = create_url("orders.php");
        $array['Log out'] = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . "/beleaf/user/controller/logout_controller.php";
    }else{
        $array['Login'] = create_url("login.php");
        $array['Registration'] = create_url("register.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../assets/js/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="/beleaf/user/assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Beleaf</title>
</head>
<body>
    <header>
        <nav class="nav">
            <a href="/beleaf/index.php" class="logo"><img src="/beleaf/user/assets/images/logo.png"></a>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label>
            <ul class="menu">
                <?php 
                    foreach($array as $key=>$value){?>
                    <li>
                        <a href="<?= $value ?>"><?= $key ?></a>
                    </li>
                    <?php } ?>
            </ul>
        </nav>
    </header>
</body>
</html>