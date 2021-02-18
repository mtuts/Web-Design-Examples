<?php

$filename = __DIR__.'/../data/info.txt';
if (file_exists($filename)) {
  $data = [];
  $i = 1;
  $p = fopen($filename, 'r');

  while (($line = fgets($p)) !== false) { // read line
    $line = explode(',', $line);  // split line to array using comma (,)
    $data[] = [
      'i' => $i,
      'fname' => $line[0],
      'lname' => $line[1],
      'email' => $line[2],
      'gender' => $line[4],
      'os' => explode('-', $line[5]),
      'city' => $line[6],
      'list' => explode('-', $line[7]),
      'color' => $line[8],
      'birth' => $line[9],
      'number' => $line[10],
      'phone' => $line[11],
      'website' => $line[12],
      'note' => $line[13]
    ];
    $i++;
  }

  fclose($p);
}