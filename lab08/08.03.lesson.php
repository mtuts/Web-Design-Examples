<?php

echo "Hello, This string
spans a number
of lines!";

$tax = 17;
$net = 200;
$copyOfNet = &$net;
$anotherCopy = $net;

$net = 100;

echo $copyOfNet;
echo '<br>';
echo $anotherCopy;

$weekday = TRUE;

echo $weekday;

$smallInt = 1;

$bool = TRUE;
$largeInt = 12345678901234567890;

var_dump($smallInt);   // var_dump print variable type and its value
var_dump($bool);
var_dump($largeInt);

/**
 * Concatenate Operator
 */

echo "Hello, " . "World!";
echo '<br>';
echo $smallInt . " " . $largeInt . "<br>";


echo "<br>";

/**
 * Arithmetic operation
 */
$s = 2 + 3;

echo "The result of 2 + 3 is $s <br>";

$one = 1;
$three = 3;

$third = $one + $three;

echo $third;

echo '<br>';

$num1 = 2.485;
$num2 = 3.234;
$sum = $num1 + $num2;

echo "$num1 + $num2 = $sum<br>";







$x = 123;
$y = 8.5;

  $z = $x + $y;
  $p = $x - $y;
  $k = $x * $y;
  $l = $x / $y;
  $q = pow($x, 2);
  $e = (120 * M_PI) / 180.0;

  echo "z = x + y = ", $z, '<br>';
  echo("z = x - y = " . $p . '<br>');
  echo "z = x * y = " . $k, '<br>';
  echo "z = x / y = " . $l, '<br>';
  echo "q = Math.pow(x, 2) = " . $q . '<br>';
  echo "e = (120 * Math.PI) / 180.0 = $e<br>";