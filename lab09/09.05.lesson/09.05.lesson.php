<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 9:30 PM
 */

class MyClass {
  public $prop1 = "Some data";
}

$m = new MyClass();
echo $m->prop1 . "<br>";

$x = new MyClass; // since no parameter for constructor no need to write parentheses
echo $x->prop1 . "<br>";


class AnotherClass {
  public $prop1;

  public function AnotherClass() {
    $this->prop1 = "Some information";
  }

  public function __destruct() {
    echo "This line will be print when object get destroyed.<br>";
  }
}

$m = new AnotherClass();
echo $m->prop1 . "<br>";


$ab = new Car("Toyota", 2016, "Camry", 28293); // we can use car class before its 
											   // declaration.

echo $ab."<br>";   // this will call toString method

$ab->setYear(1990);
$ab->setMileage(203999);
$ab->setModel("Corella");

echo "<strong>Make: </strong>" . $ab->getMake() . "<br>";
echo "<strong>Year: </strong>" . $ab->getYear() . "<br>";
echo "<strong>Model: </strong>" . $ab->getModel() . "<br>";
echo "<strong>Mileage: </strong>" . $ab->getMileage() . " kb<br>";
echo $ab."<br>";   // this will call toString method


class Car {
  private $make;
  private $year;
  private $model;
  private $mileage;

  public function __construct($make, $year, $model, $mileage = 0) {
    $this->make = $make;
    $this->year = $year;
    $this->model = $model;
    $this->mileage = $mileage;
  }

  public function getMake() {
    return $this->make;
  }

  public function setMake($make) {
    $this->make = $make;
  }

  public function getYear() {
    return $this->year;
  }

  public function setYear($year) {
    $this->year = $year;
  }

  public function getModel() {
    return $this->model;
  }

  public function setModel($model) {
    $this->model = $model;
  }

  public function getMileage() {
    return $this->mileage;
  }

  public function setMileage($mileage) {
    $this->mileage = $mileage;
  }


  public function __toString()
  {
    return "{$this->make} {$this->year}: {$this->model} [{$this->mileage} KM]";
  }


}

















