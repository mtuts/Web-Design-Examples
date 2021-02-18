<?php
/**
 *
 */
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

echo "<pre> ";
$conn = NULL;
try {
  $conn = mysqli_connect('localhost', 'root', '123');

//  var_dump($conn);
  print_r($conn);

} catch (Exception $e) {
  print_r($e->getMessage());
} finally {
  if (!is_null($conn)) {
    mysqli_close($conn);
  }
}
