<?php

require_once __DIR__.'/settings.php';

if (isset($_POST['username'], $_POST['password'])) {
  if (user_login($_POST['username'], $_POST['password'])) {
    header("Location: {$data['base']}/index.php");
  } else {
    $_SESSION['error'] = "Username or password are wrong!";
    header("Location: {$data['base']}/login.php");
  };
}