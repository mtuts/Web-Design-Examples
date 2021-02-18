<?php

function print_array($a, $with_data_type = FALSE) {
  echo "<pre>";
  if ($with_data_type) {
    var_dump($a);
  } else {
    print_r($a);
  }
  echo "</pre>";
}

function pretty_view_array($y) {
  echo "<table style='border: 1px solid black; border-spacing: 0;'>";
  foreach ($y as $key => $value) {
    echo "<tr style='border-bottom: 1px solid black;'>";
    echo "<td style='border-bottom: 1px solid black; background-color: cadetblue'>{$key}</td>";
    echo "<td style='border-bottom: 1px solid black; background-color: azure'>";
    if (is_array($value)) {
      pretty_view_array($value);
    } else {
      echo $value;
    }
    echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
}