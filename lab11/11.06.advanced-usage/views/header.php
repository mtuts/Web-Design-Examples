<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHP &amp; MySQL</title>
  <link rel="stylesheet" href="<?php echo $data['base'] ?>/css/style.css">
</head>
<body>

<div id="page-content">
  <div class="header">
    <h1>PHP &amp; MySQL Demo</h1>
    <p>Previewing Advanced PHP &amp; MySQL Usages</p>
    <ul>
      <li><a href="<?php echo $data['base'] ?>/index.php" class="active">Home</a></li>
      <?php if (is_login()): ?>
      <li><a href="<?php echo $data['base'] ?>/controllers/logout.php">Sign Out</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <div id="main-content">