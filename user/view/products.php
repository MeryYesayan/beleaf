<?php
session_start();
include "../model/user_model.php";
include "./header.php";

if(!isset($_GET['cat_id'])){
    echo "<a href='../../index.php'>Select a category</a>";
    die;
}
$_SESSION['cat_id'] = $_GET['cat_id'];
$products = $user_model->get_products($_GET['cat_id']);
if(count($products) === 0){
    echo "<p>There are no products</p>";
}else{?>
    <div class="prods">
        <?php foreach($products as $product){?>
        <div id = "<?= $product['id']?>"  class="product">
            <img src="../../admin/assets/images/<?=$product['image']?>"  alt="<?= $product['name']?>">
            <h3><?= $product['name']?></h3>
            <p><?= $product['description']?></p>
            <em><?= $product['price']?></em>
            <button class="add_cart">add to cart</button>
        </div>
        <?php }?>
    </div>
<?php } ?>

<script src="../assets/js/add_cart.js"></script>
<?php
include "./footer.php";
?>