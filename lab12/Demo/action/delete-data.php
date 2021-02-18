<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/15/16
 * Time: 6:42 PM
 */

if (isset($_POST['code'], $_POST['store'])) {

  $content = new stdClass;
  $content->result = [];
  $content->auto_increment = 1;

  if ($_POST['store'] == 'file') {

    $file = __DIR__.'/data.json';

    if (file_exists($file)) {
      $content = file_get_contents($file);
      $content = json_decode($content);
    }

    $len = count($content->result);
    for ($i = 0; $i < $len; ++$i) {
      if ($content->result[$i]->code == $_POST['code']) {
        $content->result = array_splice($content->result, $i, 1);
        break;
      }
    }

    $p = fopen($file, 'w');

    fwrite($p, json_encode($content));

    fclose($p);

    $response = new stdClass();
    $response->success = true;

    echo json_encode($response);

  } elseif ($_POST['store'] == 'db') {
    require_once __DIR__.'/db.php';
    $pdo = get_pdo();

    if (is_a($pdo, 'PDO')) {
      $sql = "DELETE FROM `info` WHERE `code` = ?;";
      $s = $pdo->prepare($sql);
      if ($s->execute([$_POST['code']])) {

        $response = new stdClass();
        $response->success = true;

        echo json_encode($response);
        exit();
      }
    }

    echo json_encode($pdo);

  }

}