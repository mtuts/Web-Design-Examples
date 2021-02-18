<?php

echo "Today is " . showDate();

function showDate() {
  $date = getthedate(); // This line should throw exception says function does not exist
  return ($date["year"] . '-'. $date["mon"] . '-' . $date["mday"]);
}