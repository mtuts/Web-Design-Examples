<?php
/**
 *
 */
mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ERROR);

echo "<pre>";
$conn = null;
try {
  $host = 'localhost';
  $username = 'root';
  $password = '123';
  $database = 'cpit405_lab11';
  $conn = new mysqli($host, $username, $password, $database);

  echo "Connect successfully\n";

  echo "<hr>";

  /* check connection */
  if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
  }

  /* SHOW query return a result */
  if ($result = $conn->query("SHOW DATABASES;")) {
    printf("Select returned %d rows.\n\n", $result->num_rows);

    while ($row = $result->fetch_assoc()) {
      printf("%s\n", $row['Database']);
    }

    /* free result set */
    $result->close();
  }

  echo "<hr>";

  /* If we have to retrieve large amount of data we use MYSQLI_USE_RESULT */
  if ($result = $conn->query("SELECT * FROM car", MYSQLI_USE_RESULT)) { // table car it may not created in your db.

    while ($row = $result->fetch_assoc()) {
      foreach ($row as $item) {
        printf("%s \t", $item);
      }
      printf("\n");
    }

    $result->close();
  }


} catch (Exception $e) {
  printf("%s [%d]: %s", basename($e->getFile()), $e->getLine(), $e->getMessage());
} finally {
  if (!is_null($conn)) {
    $conn->close();
  }
}
