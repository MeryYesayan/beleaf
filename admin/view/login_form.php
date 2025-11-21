<?php
    session_start();
?>
<form action="../controler/login_control.php" method="post">
    <input type="email" placeholder="Email" name = "login">
    <input type="password" placeholder="Password" name = "password">
    <button name="btn_login">Login</button>

    <?php
      if(isset($_SESSION['error'])){
        echo "<strong style = 'color: red'>{$_SESSION['error']}</strong>";
        unset($_SESSION['error']);
      }
    ?>
</form>