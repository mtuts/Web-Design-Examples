<?php

session_start();

function error_occur() {
  return count($_SESSION['error']) > 0;
}

function error_list() {
  $arr = $_SESSION['error'];

  unset($_SESSION['error']);

  return $arr;
}

function success_occur() {
  return count($_SESSION['success']) > 0;
}

function success_list() {
  $arr = $_SESSION['success'];

  unset($_SESSION['success']);

  return $arr;
}

function get_size_unit($size) {
  $units = ['Byte(s)', 'KB', 'MB', 'GB'];

  if ($size < 1024) {
    $result = $size;
    $unit = $units[0];
  } elseif ($size < 1024 * 1024) {
    $result = ($size / 1024);
    $unit = $units[1];
  } elseif ($size < 1024 * 1024 * 1024) {
    $result = ($size / 1024 / 1024);
    $unit = $units[2];
  } else {
    $result = ($size / 1024 / 1024 / 1024);
    $unit = $units[3];
  }

  return round($result, 2) . ' ' . $unit;
}

function get_uploaded_files() {
  $dir = __DIR__.'/uploads/';
  $files = array_diff(scandir($dir), ['.', '..']);

  $full_info = [];

  foreach ($files as $file) {
    $full_info[] = [
      'size' => get_size_unit(filesize($dir . $file)),
      'name' => $file
    ];
  }

  return $full_info;
}