<pre><?php

/**
 * Defining function
 */

function square($x) {
  return $x * $x;
}

echo square(12). "\n";

function makeNoise() {
  echo "Pling!!!";
}

makeNoise();

echo '<br>';

function power($base, $exponent) {
  $result = 1;
  for ($count = 0; $count < $exponent; ++$count) {
    $result *= $base;
  }

  return $result;
}

echo power(2, 10) . "\n";
echo pow(2, 10) . "\n";


/**
 * Parameters and scopes
 */

$x = "Outside";

function f1() {
  $x = "Inside f1";
}

f1();
echo "\$x after executing f1 function is $x<br>";


function f2() {
  global $x;
  $x = "inside f2";
}

f2();

echo "\$x after executing f2 function is $x<br>";



/**
 * anonymous function
 */

function test($r, $call) {
  $call($r);
}

test(10, function ($y) { echo "Anonymous function - " . $y; });
