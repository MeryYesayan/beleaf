<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        echo "<a href = './login.php'>please sign in</a>";
        die;
    }
    include "./header.php";
    include_once "../model/user_model.php";

    $user_id = $_SESSION['user_id'];
    $cart_item = $user_model->get_cart_items($user_id);

?>

<link rel="stylesheet" href="/beleaf/user/assets/css/style.css">

<section class="cart-part">
    <h2>Shopping Cart</h2>
    <p class="success"></p>
    <p class="error"></p>
    <div id="cart">
        <?php 
        $total = 0;
        foreach($cart_item as $item){ 
            $sum = $item['price'] * $item['quantity'];
            $total += $sum;
            ?>
            <div id="<?= $item['product_id']?>" class="cart_item">
                <div class="item-img">
                    <img  src="../../admin/assets/images/<?= $item['image']?>" alt="<?= $item['name']?>" class="product-image">
                </div>
                <div>
                    <h3 class="product-name"><?= $item['name']?></h3>
                    <p class="description"><?= $item['description']?></p>
                    <em class="price"><?= number_format($sum, 2) ?></em>
                    <div class="quantity-controls">
                        <button class="minus">-</button>
                        <strong class="quant"><?= $item['quantity']?></strong>
                        <button class="plus">+</button>
                    </div>
                    <div class="actions-cell">
                        <button class="buy">Buy</button>
                        <button class="delete_cart">Delete</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="btns">
        <h2>Total: <span class="total"><?= number_format($total, 2) ?></span> $</h2>
        <button class="buy_all">Buy All</button>
        <button class="clear">Clear cart</button>
    </div>
</section>
        
<script src="../assets/js/add_cart.js"></script>
<?php include "./footer.php"; ?>
