<?php

/**
 * Array
 */

// old way of defining array
$workdays = array("Saturday", "Sunday", "Monday", "Tuesday", "Wednesday"); 

// new way of defining array introduced in PHP 5.4+ called short definition
$weekend = ["Thursday", "Friday"]; 

echo $workdays[3]."<br>\n"; // Monday
echo $workdays[5]."<br>\n"; // out of range, so it will print nothing
echo "Array count = " . count($workdays)."<br>\n";


echo "<h1>Here are weekdays array items:</h1>";
echo "<ul>";
for ($i = 0; $i < count($workdays); ++$i) {
  echo "<li>".$workdays[$i]."</li>\n";
}
echo "</ul>";



/**
 * Merge two arrays
 */

$new_array = array_merge($workdays, $weekend);

echo '<pre>';
var_dump($new_array);

print_r($new_array);
echo '</pre>';


/**
 * Insert new item into array
 */

$xs = [1,8,3,4, "Some string", 2.3];


/** function to print array with <pre>
 * @param array $a
 * @param bool $with_data_type
 */
function print_array($a, $with_data_type = FALSE) {
  echo "<pre>";
  if ($with_data_type) {
    var_dump($a);
  } else {
    print_r($a);
  }
  echo "</pre>";
}
/**
 * There are two ways of adding item: either by using new index or appending
 */

// using index
$xs[6] = "New item";
$xs[7] = 123;

// we can jump index
$xs[9] = 843;

print_array($xs);

// using append
$yy = [3, 5, 'hello'];

$yy[] = 423423;
$yy[] = 'another item';

print_array($yy);

/**
 * Array with key
 */
$my_info = array(
  'name' => "Ali Ahmad",
  'id' => "1234567",
  'phone' => "01234567890",
);

/**
 * To add more item
 */

$my_info['address'] = "Makkah, Saudi Arabia";
$my_info['salary'] = 9834.23;

// Also you can use append

$my_info[] = "extra item";

print_array($my_info);
print_array($my_info, true);


/**
 * multi dimensional array
 */

$bitmap = [
  [1,1,0,0,0,0,1,1],
  [0,1,1,0,0,1,1,0],
  [0,0,1,1,1,1,0,0],
  [0,1,1,0,0,1,1,0],
  [1,1,0,0,0,0,1,1]
];

print_array($bitmap);

$data = [
  ["Khalid", 'Ali', 4234, 234],
  ["Saeed", "Ahmad"],
  [234.3, 34, [1,5], 234, 2, true],
];

echo $data[0]."<br>"; // Array
echo $data[0][0]."<br>"; // Khalid
echo $data[2][1]."<br>"; // Ahmad
echo $data[3][3]."<br>"; // 234
echo $data[3][2][1]."<br>"; // 5

print_array($data);

// Read more about array functions




