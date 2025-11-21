<?php 
 session_start();
 if(!isset($_SESSION['admin_id'])){
    echo "<h3>Please login</h3>";
    echo "<a href = './login_form.php'>log in</a>";
    die;
}

include("./header.php");
include("../model/admin_model.php");

if(!isset($_GET['cat_id'])){
    echo "<h3>please select <a href = './home.php '>category</a></h3>";
    die;
}
$_SESSION['cat_id'] = $_GET['cat_id'];
$cat_product = $admin_model->get_products($_SESSION['cat_id']);
?>

<h2>Add new Products</h2>

<form action="../controler/add_product.php" method="post" enctype="multipart/form-data" class="prod_form" style="display: flex; flex-direction:column; width:400px; align-items:baseline; margin: 20px">
    <input type="text" placeholder="name" name="name">
    <input type="number" placeholder="price" name="price">
    <textarea name="desc" placeholder="description"></textarea>
    <input type="file" name="image">
    <button name="btn_add">add</button>
    <?php
        if(isset($_SESSION['error'])){
            echo "<strong style = 'color: red'>".$_SESSION['error']."</strong>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['okay'])){
            echo "<strong style = 'color: green'>".$_SESSION['okay']."</strong>";
            unset($_SESSION['okay']);
        }
    ?>
</form>

<h2>Products</h2>
<div style="padding: 30px 0;">

    <?php 
    if(!count($cat_product)){
        echo "No products";
    }else { ?>
        <table border="2" cellspacing = "0" cellpadding = "10" style="width: 85%; margin: 0 auto;">
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price($)</th>
                <th>Description</th>
                <th colspan="2">Settings</th>
            </tr>
            <?php
            foreach($cat_product as $product){ ?>
                <tr id="<?= $product['id']?>" class="row">
                    <td contenteditable class="name"><?= $product['name']?></td>
                    <td>
                        <img src="../assets/images/<?=$product['image']?>"  alt = "<?=$product['name']?>" height="180">
                    </td>
                    <td contenteditable class="price" ><?= $product['price']?></td>
                    <td contenteditable class="desc"><?= $product['description']?></td>
                    <td><button class="upd_product">update</button></td>
                    <td><button class="del_product">delete</button></td>
                </tr>
            <?php } ?>
        </table> 
    <?php } ?>          
            
</div>
            <?php
include("./footer.php");
?>