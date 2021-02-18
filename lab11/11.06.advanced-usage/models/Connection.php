<?php

/**
 * A singleton class to manage all connection to DB
 * Created by PhpStorm.
 * User: Marwan
 * Date: 12/11/16
 * Time: 6:26 PM
 */
class Connection {
  /**
   * @var Connection
   */
  private static $instance = NULL;

  /**
   * @var PDO
   */
  private $db;

  /**
   * Connection constructor.
   */
  private function __construct($host = NULL, $user = NULL, $pass = NULL, $db = NULL) {
    $this->db = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
   * @param string $host
   * @param string $user
   * @param string $pass
   * @param string $db
   * @return Connection
   */
  public static function get_instance($host = NULL, $user = NULL, $pass = NULL, $db = NULL) {
    if (is_null(self::$instance)) {
      self::$instance = new Connection($host, $user, $pass, $db);
    }
    return self::$instance;
  }

  /**
   * @return PDO
   */
  public function pdo() {
    return $this->db;
  }

}