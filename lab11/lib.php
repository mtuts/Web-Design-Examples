<?php


/**
 * @param PDO $conn
 */
function load_car_table($conn) {

  echo "<hr>";

  $stmt= $conn->prepare("SELECT * FROM `car`;");
  if ($stmt->execute()) {

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

}
/**
 * @param PDO $conn
 * @param string $table_name
 */
function load_table($conn, $table_name) {

  echo "<hr>";

  $result= $conn->query("SELECT * FROM `{$table_name}`;");
  $result->bindParam(':table_name', $table_name);

  $total_column = $result->columnCount();

  echo "<h2>{$table_name}</h2>";
  echo "<table>";
  echo "<tr>";
  for ($i = 0; $i < $total_column; $i ++) {
    $meta = $result->getColumnMeta($i);
    $column[] = $meta['name'];
    echo "<th>{$meta['name']}</th>";
  }
  echo "</tr>";
  while ($row = $result->fetch(PDO::FETCH_BOTH)) {
    echo "<tr>";
    $i = 0;
    for ($i = 0; $i < $total_column; ++$i) {
      printf("<td>%s</td>", $row[$i]);
    }
    echo "</tr>";
  }
  echo "</table>";

}