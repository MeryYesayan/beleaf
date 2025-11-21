<?php 
session_start();
if(!isset($_SESSION['admin_id'])){
    echo "<h3>Please login</h3>";
    echo "<a href = './login_form.php'>log in</a>";
    die;
}
include("./header.php");
include_once("../model/admin_model.php");
$all_categories = $admin_model->get_categories();
?>
<link rel="stylesheet" href="beleaf/admin/assets/css/style.css">
<main>
<form action="../controler/add_category.php" method="post" enctype="multipart/form-data">
    <h2>Add category</h2>
    <input type="text" placeholder="Category name" name="name">
    <input type="file" name="image">
    <button name="add_category">Add</button>
    <?php
        if(isset($_SESSION['error'])){?>
            <strong style="color: red;"><?= $_SESSION['error']?></strong>
    <?php 
             unset($_SESSION['error']);
        }
        if(isset($_SESSION['okay'])){ ?>
          <strong style="color: green;"><?= $_SESSION['okay']?></strong>
    <?php 
            unset($_SESSION['okay']);
        } 
    ?>
</form>
<h2>Categories</h2>
<p class="message" style="position: fixed; top:0; right: 0"></p>
<table>
    <?php 
    foreach($all_categories as $category){ ?>
        <tr id="<?= $category['id']?>" class="row">
            <td>
                  <img src="../assets/images/<?=$category['image']?>"  alt = "<?=$category['name']?>" height="100">
                
            </td>
            <td contenteditable class="name"><?= $category['name']?></td>
            <td>
                <button class = "upd_category">Update</button>
            </td>
            <td>
                <button class = "del_category">Delete</button>
            </td>
            <td>
                <a href="./products.php?cat_id=<?= $category['id']?>">Show products</a>
            </td>
        </tr>
    <?php } ?>
</table>
</main>
<?php
include("./footer.php")
?>