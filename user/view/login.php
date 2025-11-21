<?php
    session_start();
?>
<link rel="stylesheet" href="../assets/css/style.css">

<section class="login">
    <div class="wrapper">
      <form action="../controller/login_controller.php" method="post">
            <h2>Login</h2>
            <div class="input-field">
                <input type="email"name="email" placeholder="Enter your email">
            </div>
            <div class="input-field">
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <button name="login_btn">Login</button>
            <?php
                if(isset($_SESSION['error'])){
                   echo "<p style='color: rgb(226, 16, 16); padding-top: 20px; font-size: 24px'>". $_SESSION['error']."</p>";
                    unset($_SESSION['error']);
                }
            ?>
      </form>
    </div>
</section>
