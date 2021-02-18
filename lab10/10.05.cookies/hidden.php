<?php

if (isset($_COOKIE['login_status']) && $_COOKIE['login_status'] == 1) {

    ?>
  <h2>This is a secure page</h2>
  <a href="logout.php">Logout</a>
<?php
} else {
    header('Location: index.php');
}

