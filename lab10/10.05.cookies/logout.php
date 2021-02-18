<?php

if (isset($_COOKIE['login_status']) && $_COOKIE['login_status'] == 1) {
    setcookie('login_status', 0, time() - 1000, dirname($_SERVER['PHP_SELF']));

    ?>


  <p>Successfully logout!!!</p><br>
  <a href="index.php">login again</a>

<?php
}