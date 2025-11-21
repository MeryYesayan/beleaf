<?php 
    session_start();
    
?>
<link rel="stylesheet" href="../assets/css/style.css">


<section class="login">
    <div class="wrapper">
      <form action="../controller/reg_controller.php" method="post">
            <h2>Registration</h2>
            <div class="input-field">
                <input type="text" placeholder="Name Surname" name="fullname">
            </div>
            <div class="input-field">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-field">
                <input type="email" placeholder="Email" name="email">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-field">
                <input type="password" placeholder="Repeat password" name="re_password">
            </div>
            <button name="reg_btn">Register</button>
            <?php
                if(isset($_SESSION['error'])){
                   echo "<p style='color: rgb(230, 6, 6); padding-top: 20px; font-size: 24px'>". $_SESSION['error']."</p>";
                    unset($_SESSION['error']);
                }
            ?>
      </form>
    </div>
</section>