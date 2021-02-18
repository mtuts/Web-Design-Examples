<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/17/16
 * Time: 10:55 PM
 */

function get_pdo() {
  $host = "localhost";
  $username = "root";
  $password = '123';
  $dbname = 'cpit405_lab12';

  try {
    $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    return $pdo;
  } catch (PDOException $p) {
    $output['error'][] = $p->getMessage();
  } catch (Exception $e) {
    $output['error'][] = $e->getMessage();
  }

  return $output;
}