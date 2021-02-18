<?php
require_once __DIR__.'/settings.php';

$info = [];
if (!is_login()) {
  header("Location: {$data['base']}/login.php");
  exit();
} elseif ($_SERVER['PHP_SELF'] == $data['base'].'/edit.php') {
  if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $info = get_customer($_GET['id']);

    if ($info === false) {
      header("Location: {$data['base']}/index.php");
      exit();
    }
  } else {
    header("Location: {$data['base']}/index.php");
    exit();
  }
} elseif ($_SERVER['PHP_SELF'] == $data['base'].'/controllers/customer.php' && isset($_GET['delete']) && is_numeric($_GET['delete'])) {
  $_SESSION['edit_mode'] = true;
  if (delete_customer($_GET['delete'])) {

    $_SESSION['success'] = ['Customer deleted successfully!'];
    header("Location: {$data['base']}/index.php");
    exit();
  } else {
    $_SESSION['error'] = ['Failed delete customer!'];
    header("Location: {$data['base']}/index.php");
    exit();
  }
} elseif (isset($_POST['user_id'], $_POST['first-name'], $_POST['last-name'], $_POST['email']) && is_numeric($_POST['user_id'])) {
  foreach ($_POST as $key => $value) {
    if (isset($_SESSION[$key])) unset($_SESSION[$key]);
  }
  $_SESSION['edit_mode'] = true;
  try {
    if (update_user($_POST['user_id'], $_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['birth'],
      $_POST['gender'] == 'male', $_POST['pass'], $_POST['phone'], $_POST['address'])) {

      $_SESSION['success'] = ['[ '.$_POST['first-name'] . ' ' . $_POST['last-name']. ' ] profile has been updated!'];
      header("Location: {$data['base']}/index.php");
    } else {
      foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
      }
      $_SESSION['error'] = ['[ '.$_POST['first-name'] . ' ' . $_POST['last-name']. ' ] profile has failed update!'];
      header("Location: {$data['base']}/edit.php");
    }
  } catch (Exception $e) {

    $_SESSION['error'] = ['[ '.$_POST['first-name'] . ' ' . $_POST['last-name']. ' ] profile has failed update!'];
    $_SESSION['error'][] = $e->getMessage();
    header("Location: {$data['base']}/edit.php");
  }
} elseif (isset($_POST['first-name'], $_POST['last-name'], $_POST['email'])) {
  foreach ($_POST as $key => $value) {
    if (isset($_SESSION[$key])) unset($_SESSION[$key]);
  }

  $_SESSION['edit_mode'] = false;
  try {
    if (add_new_user($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['pass'], $_POST['birth'],
      $_POST['gender'] == 'male', $_POST['phone'], $_POST['address'])) {
      $_SESSION['success'] = ['[ '.$_POST['first-name'] . ' ' . $_POST['last-name']. ' ] profile has been inserted!'];

    } else {
      foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
      }
      $_SESSION['error'] = ['[ ' . $_POST['first-name'] . ' ' . $_POST['last-name'] . ' ] profile has failed insert!'];
    }

  } catch (Exception $e) {
    $_SESSION['error'] = ['[ '.$_POST['first-name'] . ' ' . $_POST['last-name']. ' ] profile has failed insert!'];
    $_SESSION['error'][] = $e->getMessage();
  }
  header("Location: {$data['base']}/index.php");
}

