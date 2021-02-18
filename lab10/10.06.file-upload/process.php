<?php

session_start();

/**
 *  following 8 lines are for debugging
 */
//echo "<pre>";
//echo "POST:\n";
//print_r($_POST);
//echo "\n<hr>SERVER:\n";
//print_r($_SERVER);
//echo "\n<hr>FILES single:\n";
//print_r($_FILES['single-file']);
//echo "\n<hr>FILES single image:\n";
//print_r($_FILES['single-image']);
//echo "\n<hr>FILES: multi\n";
//print_r($_FILES['multi-files']);



$_SESSION['error'] = [];
$_SESSION['success'] = [];
if (isset($_POST['submit-btn'])) {
  $upload_folder = __DIR__.'/uploads/';
  if (isset($_FILES['single-file']) && $_FILES['single-file']['error'] == 0) {
    $file = $_FILES['single-file'];


    if (file_exists($upload_folder.$file['name']) && !(isset($_POST['replace-confirm']) && $_POST['replace-confirm'] == 1)) {
      $_SESSION['error'][] = "[ ".$file['name'] . "] is already exists!";
    } else {
      if (move_uploaded_file($file['tmp_name'], $upload_folder.$file['name'])) {
        $_SESSION['success'][] = "[ ".$file['name'] . "] successfully uploaded!";
      }
    }

  }
  if (isset($_FILES['single-image']) && $_FILES['single-image']['error'] == 0) {
    $file = $_FILES['single-image'];


    if (file_exists($upload_folder.$file['name']) && !(isset($_POST['replace-confirm']) && $_POST['replace-confirm'] == 1)) {
      $_SESSION['error'][] = "[ ".$file['name'] . "] is already exists!";
    } else {
      if (move_uploaded_file($file['tmp_name'], $upload_folder.$file['name'])) {
        $_SESSION['success'][] = "[ ".$file['name'] . "] successfully uploaded!";
      }
    }

  }
  if (isset($_FILES['multi-files'])) {
    $files = $_FILES['multi-files'];


    $c = count($files['name']);
    for ($i = 0; $i < $c; $i++) {
      if ($files['error'][$i] == 0 && file_exists($upload_folder.$files['name'][$i]) && !(isset($_POST['replace-confirm']) && $_POST['replace-confirm'] == 1)) {
        $_SESSION['error'][] = "[ ".$files['name'][$i] . "] is already exists!";
      } else {
        if (move_uploaded_file($files['tmp_name'][$i], $upload_folder.$files['name'][$i])) {
          $_SESSION['success'][] = "[ ".$files['name'][$i] . "] successfully uploaded!";
        }
      }
    }

  }
}

header('Location: index.php');