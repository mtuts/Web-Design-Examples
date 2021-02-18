<?php include_once __DIR__.'/action/read.php'; ?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>PHP From Handler</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

<a href="index.php">&lt;&lt; back</a>

<?php if (isset($data) && is_array($data) && count($data) > 0): ?>
<h2>Here your data:</h2>
<table>
  <thead>
  <tr>
    <th>#</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Gender</th>
    <th>Favorite OS</th>
    <th>City</th>
    <th>List</th>
    <th>Favorite Color</th>
    <th>Birth Date</th>
    <th>Favorite Number</th>
    <th>Phone Number</th>
    <th>Website</th>
    <th>Note</th>
  </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    ?>
  <?php foreach ($data as $item): ?>
  <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $item->first_name; ?></td>
    <td><?php echo $item->last_name; ?></td>
    <td><?php echo $item->email; ?></td>
    <td><?php echo $item->gender; ?></td>
    <td>

      <?php if (count($item->favorite_os) > 0): ?>
        <ul>
        <?php foreach ($item->favorite_os as $a): ?>
          <li> <?php echo $a; ?> </li>
        <?php endforeach; ?>
        </ul>
      <?php else: ?>
        N/A
      <?php endif; ?>
    </td>
    <td><?php echo $item->city; ?></td>
    <td>

      <?php if (count($item->list) > 0): ?>
        <ul>
          <?php foreach ($item->list as $a): ?>
            <li> <?php echo $a; ?> </li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        N/A
      <?php endif; ?>
    </td>
    <td style="background-color: <?php echo $item->color; ?>" class="shadow-text"><?php echo $item->color; ?></td>
    <td><?php echo $item->birth_date; ?></td>
    <td><?php echo $item->favorite_number; ?></td>
    <td><?php echo $item->phone; ?></td>
    <td><a href="<?php echo $item->website; ?>"><?php echo $item->website; ?></a></td>
    <td><pre><?php echo $item->note; ?></pre></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<?php else: ?>
  <h3>There are no saved data yet!!</h3>
<?php endif; ?>
</body>
</html>