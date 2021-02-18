<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/15/16
 * Time: 6:42 PM
 */

if (isset($_POST['action'], $_POST['code'], $_POST['full_name'], $_POST['email'], $_POST['store'])) {

  $new_code = 0;

  $content = new stdClass;
  $content->result = [];
  $content->auto_increment = 1;


  if ($_POST['store'] == 'file') {

    $file = __DIR__.'/data.json';

    if (file_exists($file)) {
      $content = file_get_contents($file);
      $content = json_decode($content);
    }

    if ($_POST['action'] == 'edit') {
      $new_code = $_POST['code'];
      $len = count($content->result);
      for ($i = 0; $i < $len; ++$i) {
        if ($content->result[$i]->code == $_POST['code']) {
          $content->result[$i]->full_name = $_POST['full_name'];
          $content->result[$i]->email = $_POST['email'];
          break;
        }
      }
    } else {
      $new_code = $content->auto_increment;
      $content->auto_increment++;
      $content->result[] = [
        'code' => $new_code,
        'full_name' => $_POST['full_name'],
        'email' => $_POST['email']
      ];
    }

    $p = fopen($file, 'w');

    fwrite($p, json_encode($content));

    fclose($p);

  } elseif ($_POST['store'] == 'db') {
    require_once __DIR__.'/db.php';
    $pdo = get_pdo();

    if (is_a($pdo, 'PDO')) {

      $content->result = [];


      if ($_POST['action'] == 'edit') {

        $sql = "UPDATE `info` SET `full_name` = ?, `email` = ? WHERE `code` = ?;";
        $s = $pdo->prepare($sql);
        if (!$s->execute([$_POST['full_name'], $_POST['email'], $_POST['code']])) {
          $content->error = ['Unable to update field from database!'];
        }
        $new_code = $_POST['code'];
      } else {
        $sql = "INSERT INTO `info` (`full_name`, `email`) VALUES (?, ?);";
        $s = $pdo->prepare($sql);
        if (!$s->execute([$_POST['full_name'], $_POST['email']])) {
          $content->error = ['Unable to insert field from database!'];
        }
        $new_code = $pdo->lastInsertId();
      }

    } else {
      echo json_encode($pdo);
      exit();
    }


  }

  $response = new stdClass();
  $response->success = true;
  $response->code = $new_code;

  echo json_encode($response);

}