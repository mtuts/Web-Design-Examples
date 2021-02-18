<?php

if (isset($_POST['username'], $_POST['pass']) && $_POST['username'] == 'ali' && $_POST['pass'] == "123") {
    setcookie('login_status', 1, time() + 60, dirname($_SERVER['PHP_SELF']));
    header('Location: hidden.php');
} else {
    session_start();
    $_SESSION['error'] = "Wrong Pass or Username";
    header('Location: index.php');

}