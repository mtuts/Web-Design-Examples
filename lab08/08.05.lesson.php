<pre><?php

/**
 * loop
 */
$num = 0;

while ($num <= 12) {
  echo $num  . "\n";
  $num = $num + 2; // $num += 2;
}

for ($num = 0; $num <= 12; $num += 2) {
  echo $num  . "\n";
}

$m = 0;
for ($i = 0; $i < 100; $i++) {
  $m += $i;
}

echo "Sum (0 to 99) = {$m}\n\n";


while ($m < 2000) {
  $m += 2;
}

echo "After while loop \$m = $m\n";

do {
  echo "You will see this text only once!";
} while (FALSE);

for ($current = 20; $current < 99999; $current++) {
  if ($current % 7 == 0)
    break;
}

