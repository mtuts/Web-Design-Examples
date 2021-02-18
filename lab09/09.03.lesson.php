<?php

//date_default_timezone_set("Asia/Riyadh");

echo "Today is " . showDate();

function showDate() {
  $date = getdate(); // correct method, however, it may display a warning of time zone, so uncomment line three
  return ($date["year"] . '-'. $date["mon"] . '-' . $date["mday"]);
}