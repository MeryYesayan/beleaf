<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        echo "<a href = './login.php'>please sign in</a>";
        die;
    }
    include "./header.php";
    include_once "../model/user_model.php";
    $user_id = $_SESSION['user_id'];
    $orders_items = $user_model->get_orders($user_id);
?>


<section class="all-ords">
    <div class="order">
        <h2>Your Orders</h2>

        <?php if (!empty($orders_items)) { ?>
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders_items as $item) { 
                        $sum = $item['price'] * $item['quantity']; ?>
                        <tr>
                            <td>
                                <img src="../../admin/assets/images/<?= $item['image']?>" alt="<?= $item['name']?>" class="product-image">
                            </td>
                            <td class="ord-text"><?= $item['name']?></td>
                            <td class="ord-text"><?= number_format($sum, 2) ?> </td>
                            <td class="ord-text"><?= $item['quantity']?></td>
                            <td class="ord-text"><?= $item['created_at']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p class="no-orders">No orders yet</p>
        <?php } ?>

    </div>
</section>

<?php  include "./footer.php"; ?>
