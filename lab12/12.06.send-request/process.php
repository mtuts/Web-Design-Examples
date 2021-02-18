<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/18/16
 * Time: 9:41 AM
 */

$filename = __DIR__.'/output.txt';

if (isset($_POST['full_name'], $_POST['email'])) {
  $fp = fopen($filename, 'a');

  $line = "{$_POST['full_name']}, {$_POST['email']}\n";
  fwrite($fp, $line);

  fclose($fp);

  sleep(1); // sleep 1 second for debugging only, to see loading bar since we use localhost which is very fast.

  echo file_get_contents($filename);
} elseif (file_exists($filename)) {

  sleep(1); // sleep 1 second for debugging only
  echo file_get_contents($filename);
}