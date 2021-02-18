<?php

/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 9:56 PM
 */
class Person
{
  /**
   * @var string Person Name
   */
  private $name;

  /**
   * @var int birthdate timestamp
   */
  protected $birth_date;

  /**
   * @var string phone number
   */
  private $phone;

  /**
   * Person constructor.
   * @param string $name
   * @param int $birth_date
   */
  public function __construct($name, $birth_date) {
    $this->name = $name;
    $this->birth_date = $birth_date;

    $this->phone = NULL;
  }

  /**
   * @return string
   */
  public function getName() {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName($name) {
    $this->name = $name;
  }

  /**
   * @param string $format
   * @return string
   */
  public function getBirthDate($format = 'j / m / Y') {
    $formatted_date = date($format, $this->birth_date);
    return $formatted_date;
  }

  /**
   * @param string $birth_date
   */
  public function setBirthDate($birth_date) {
    $this->birth_date = strtotime($birth_date);
  }

  /**
   * @return string
   */
  public function getPhone()
  {
    return $this->phone;
  }

  /**
   * @param string $phone
   */
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }

}