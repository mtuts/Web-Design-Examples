<?php
/**
 * Created by PhpStorm.
 * User: Marwan
 * Date: 11/28/16
 * Time: 9:55 PM
 */

require_once __DIR__.'/models/Person.php';
require_once __DIR__.'/models/Teacher.php';
require_once __DIR__.'/models/Student.php';

date_default_timezone_set('Asia/Riyadh');

$t = mktime(0, 0, 0, 10, 12, 2000);
$q = new Person("Ahmad", $t);

echo $q->getName() . " born in " . $q->getBirthDate() . "<br>";
echo $q->getName() . " born in " . $q->getBirthDate('M j, Y') . "<br>";

$q = new Student("Ali", $t, "1234567");

echo $q->getName() . " born in " . $q->getBirthDate() . ", " . $q->getId() . "<br>";
echo $q . "<br>";

$q = new Teacher("Ahmad", $t, 93484);

echo $q . "<br>";

