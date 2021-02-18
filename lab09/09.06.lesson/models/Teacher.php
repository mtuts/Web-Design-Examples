<?php

require_once __DIR__.'/Person.php';
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 10:08 PM
 */
class Teacher extends Person
{

  /**
   * @var float
   */
  private $salary;

  /**
   * Teacher constructor.
   * @param string $name
   * @param int $birth_date
   * @param float $id
   */
  public function __construct($name, $birth_date, $id)
  {
    parent::__construct($name, $birth_date);

    $this->salary = $id;
  }

  /**
   * @param string $format
   * @return string
   */
  public function getBirthDate($format = "l F j, Y") {
    return parent::getBirthDate($format);
  }

  /**
   * @return float
   */
  public function getSalary()
  {
    return $this->salary;
  }

  /**
   * @param float $salary
   */
  public function setSalary($salary) {
    $this->salary = $salary;
  }

  public function __toString()
  {
    return $this->getName() . ", born in " . $this->getBirthDate() . " with salary " . $this->getSalary() . " SAR";
  }


}