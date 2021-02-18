<?php

require_once __DIR__.'/../lib.php';

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

  // The following way allow us to create reference and execute the SQL statement several times
  $sql = "INSERT INTO car (`Chassis`, `Manufacturer`, `Model`, `Year`, `color`) VALUES (:chassis, :manuf, :model, :year, :color)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':chassis', $chass);
  $stmt->bindParam(':manuf', $man);
  $stmt->bindParam(':model', $md);
  $stmt->bindParam(':year', $y);
  $stmt->bindParam(':color', $c);

// insert one row
  $chass = '7718729';
  $man = 'VW';
  $md = 'Passat';
  $y = 2000;
  $c = 'Yellow';
  $stmt->execute();

  echo "New row has been added\n";

// insert another row with different values
  $chass = '22441735';
  $man = 'Toyota';
  $md = 'Camry';
  $y = 2017;
  $c = 'Black';
  $stmt->execute();

  echo "New row has been added\n";

  load_car_table($conn);

  echo "<hr>";
  $search_word = "amry";
  echo "<h3>Search Result of [ {$search_word} ]:</h3>";

  $stmt= $conn->prepare("SELECT * FROM `car` WHERE `Model` LIKE ?");
  if ($stmt->execute(["%{$search_word}%"])) {

    echo "<table>";
    echo "<tr>";
    echo "<th>Chassis</th>";
    echo "<th>Manufacturer</th>";
    echo "<th>Model</th>";
    echo "<th>Year</th>";
    echo "<th>Color</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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

  echo "<hr>";

  // The following way allow us to create reference and execute the SQL statement several times
  $sql = "UPDATE car SET `Manufacturer` = ?, `Model` = ?, `Year` = ?, `color` = ? WHERE `Chassis` = ?";
  $stmt = $conn->prepare($sql);

  $stmt->execute(['Nissan', 'Sunny', 2011, 'Pink', 22441735]);

  echo "<p>Record has been updated!</p>";

  load_car_table($conn);

  // DELETE inserted records
  echo "<hr>";
  echo "<h3>Delete Inserted Records</h3>";

  // The following way allow us to create reference and execute the SQL statement several times
  $sql = "DELETE FROM car WHERE `Chassis` = ?";
  $stmt = $conn->prepare($sql);

  $stmt->execute([7718729]);
  echo "<p>Delete Success</p>";
  $stmt->execute([22441735]);
  echo "<p>Delete Success</p>";

  load_car_table($conn);


} catch (Exception $e) {
  printf("%s [%d]: %s", basename($e->getFile()), $e->getLine(), $e->getMessage());
} finally {
  $conn = NULL;
}
