<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/15/16
 * Time: 6:42 PM
 */

if (isset($_POST['store'])) {

  $content = new stdClass();
  if ($_POST['store'] == 'file') {

    $file = __DIR__.'/data.json';

    if (file_exists($file)) {
      $content = file_get_contents($file);
    }

    echo $content;

  } elseif ($_POST['store'] == 'db') {
    require_once __DIR__.'/db.php';
    $pdo = get_pdo();

    if (is_a($pdo, 'PDO')) {

      $content->result = [];

      $sql = "SELECT * FROM `info`;";
      if ($result = $pdo->query($sql)) {

        $content->result = [];
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
          $content->result[] = [
            'code' => $row['code'],
            'full_name' => $row['full_name'],
            'email' => $row['email']
          ];

        }

        echo json_encode($content);
        exit();
      }
    }

    echo json_encode($pdo);

  }

}