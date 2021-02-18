<?php

$filename = __DIR__.'/../data/info.txt';
if (file_exists($filename)) {
  $contents = file_get_contents($filename);
  $i = 1;
  $data = json_decode($contents);
}