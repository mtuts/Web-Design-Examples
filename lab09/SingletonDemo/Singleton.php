<?php

/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 10:44 PM
 */
class Singleton {

  /**
   * @var string
   */
  private $info;

  /**
   * @var Singleton
   */
  private static $instance = NULL;
  private static $counter = 0; // to keep track creating instance

  private function __construct() {
    $this->info = "I'm the only instance of Singleton class!";
    self::$counter++;
  }

  public static function getInstance() {
    if (is_null(self::$instance)) {
      self::$instance = new Singleton();
    }
    return self::$instance;
  }

  /**
   * @return int
   */
  public static function getCounter() {
    return self::$counter;
  }

  /**
   * @return string
   */
  public function getInfo()
  {
    return $this->info . " counter: " . self::getCounter();
  }

}