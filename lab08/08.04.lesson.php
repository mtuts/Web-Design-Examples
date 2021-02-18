<pre><?php

/**
 * Boolean values
 */

print (3 > 2) . "\n"; // true
echo(3 < 2) . "\n"; // false
echo("Ali" < "Zio") . "\n"; // true
echo "Itchy" != "Scratchy"  . "\n"; // true
echo false == 0  . "\n"; // true
echo null == NULL . "\n"; // true
echo null == 0 . "\n"; // false

/**
 * Logical operators
 */
echo (true && false) . "\n"; // false
echo (true && true) . "\n"; // true
echo (true || false) . "\n"; // true
echo (false || false) . "\n"; // false

/**
 * if-else-statement
 */
  $z = 10;
  $k = 29.3;
  $p = 9;
  $q = 2;
  $e = M_PI;

  if ($z > $p) {
    $u = true;
  } else if ($k < $e) {
    $u = false;
  }

  echo "u: ", $u . "\n";

  if ($z - $q == $e || $q >= $p) {
    $a = false;
  } else {
    $a = !$u;
  }

  echo "a: " . $a . "\n";

  /**
   * short if-statement
   */

  $x = 10;
  $y = 20;

  $z = ($x > $y ? "x > y" : "x < y");

  echo "z = " . $z . "\n";

  $x = rand(0, 100) > 10 && rand(0, 100) < 20 ? "Picked two numbers b/w 10 and 20" : 
  		"Picked different range!";

  echo "x: " . $x . "\n";







  /**
   * switch statement
   */

  $x = rand(-10, 5);

  switch ($x) {
    case 1:
      echo "x equals one!" . "\n";
      break;

    case 2:
      echo "x equals two!" . "\n";
      break;

    case 5:
      echo "x equals five!" . "\n";
      break;

    default:
      echo "switch default case found x = ". $x . "\n";
  }

