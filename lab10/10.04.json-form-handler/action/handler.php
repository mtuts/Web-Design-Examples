<?php

/**
 * Following two lines are for debugging
 */
//print '<pre>';
//print_r($_POST);  // $_POST is array of all fields sent using get method.


if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['pass'], $_POST['re_pass'], $_POST['agree'])) {

  if ($_POST['pass'] != $_POST['re_pass']) {
    header('Location: ../index.php?error=' . urlencode('Confirm password, both should be equals!'));
    exit();
  }
  $new_data = $_POST;

  $filename = __DIR__.'/../data/info.txt';

  $data = [];
  if (file_exists($filename)) {
    $content = file_get_contents($filename);
    $json = json_decode($content);
    if (!is_null($json)) {
      $data = $json;
    }
  }

  $data[] = $new_data;
  $json = json_encode($data);

  $fp = fopen(__DIR__.'/../data/info.txt', 'w');
  fwrite($fp, $json);

  fclose($fp);

  header('Location: ../result.php');
} else {
  header('Location: ../index.php?error=' . urlencode('Please fill all required data'));
}
