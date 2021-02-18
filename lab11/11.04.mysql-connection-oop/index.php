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
  // PDO class gives ability of choosing type of DB whether MySQL, ORACLE, MS SQL, and much more using correct driver!
  $conn = new PDO("mysql:host={$host};dbname={$database}", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo "Connect successfully\n";

  echo "<hr>";

  /* SHOW query return a result */
  if ($stmt = $conn->query("SHOW DATABASES;")) {
    printf("Select returned %d rows.\n\n", $stmt->rowCount());

    while ($row = $stmt->fetchColumn()) {
      printf("%s\n", $row);
    }
  }

  echo "<hr>";

  if ($result = $conn->query("SELECT * FROM car", PDO::FETCH_BOTH)) { // table car it may not created in your db.

    while ($row = $result->fetch(PDO::FETCH_NUM)) {
      foreach ($row as $item) {
        printf("%s \t", $item);
      }
      printf("\n");
    }
  }

  echo "<hr>";

  // Using column name
  if ($result = $conn->query("SELECT * FROM car", PDO::FETCH_BOTH)) { // table car it may not created in your db.
    echo "<table>";
    echo "<tr>";
    echo "<th>Chassis</th>";
    echo "<th>Manufacturer</th>";
    echo "<th>Model</th>";
    echo "<th>Year</th>";
    echo "<th>Color</th>";
    echo "</tr>";

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
//      printf("%s \t %s \t %s \t %s \t %s\n", $row['Chassis'], $row['Manufacturer'], $row['Model'], $row['Year'], $row['Color']);

      echo "<tr>";
      printf("<td>%s</td>", $row['Chassis']);
      printf("<td>%s</td>", $row['Manufacturer']);
      printf("<td>%s</td>", $row['Model']);
      printf("<td>%s</td>", $row['Year']);
      printf("<td>%s</td>", $row['Color']);
      echo "</tr>";
    }
    echo "</table>";
  }


} catch (Exception $e) {
  printf("%s [%d]: %s", basename($e->getFile()), $e->getLine(), $e->getMessage());
} finally {
  $conn = NULL;
}
