<?php

require_once __DIR__.'/Person.php';

/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 10:08 PM
 */
class Student extends Person
{

  /**
   * @var string
   */
  private $id;

  /**
   * Teacher constructor.
   * @param string $name
   * @param int $birth_date
   * @param string $id
   */
  public function __construct($name, $birth_date, $id)
  {
    parent::__construct($name, $birth_date);

    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param string $id
   */
  public function setId($id) {
    $this->id = $id;
  }


  public function __toString()
  {
    return $this->getId() . ": ". $this->getName() . ", born in " . $this->getBirthDate();
  }


}