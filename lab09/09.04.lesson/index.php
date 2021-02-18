<?php

require_once 'lib.php'; // include lib.php file in order to use its methods



$sections = [
  'cpit252' => [
    '0123456' => 'Mohammad',
    '3253648' => 'Ali',
    '2342344' => 'Fahad',
    '8979843' => 'Khalid'
  ],
  'cpit305' => [
    '5467544' => 'Ayman',
    '2342344' => 'Fahad',
    '4563634' => 'Zaid',
    '9823498' => 'Odai'
  ],
  'cpit405' => [
    '1238382' => 'Osama',
    '1353648' => 'Eyad',
    '1642344' => 'Saeed',
    '1979843' => 'Ameen'
  ]
];


print_array($sections);
print_array($sections, true);


pretty_view_array($sections);

$nums = [
  3434, 2.232, [34, 'something', $sections, 'another item'], 9323
];

pretty_view_array($nums);