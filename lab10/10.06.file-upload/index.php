<?php
include_once __DIR__.'/lib.php';

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>File Upload</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>File Upload</h1>

<?php if (error_occur()): ?>
  <ul class="error">
    <?php foreach (error_list() as $item): ?>
      <li><?php echo $item; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php if (success_occur()): ?>
  <ul class="success">
    <?php foreach (success_list() as $item): ?>
      <li><?php echo $item; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<form action="process.php" method="post" enctype="multipart/form-data">

  <div>
    <label>Choose any file
      <input type="file" name="single-file">
    </label>
  </div>
  <div>
    <label>Choose only one image
      <input type="file" name="single-image" accept="image/*">
    </label>
  </div>
  <div>
    <label>Choose multiple pdf/zip/mp3 files
      <input type="file" name="multi-files[]" accept="application/pdf,application/zip,audio/mp3" multiple>
    </label>
  </div>

  <div>
    <label>
      <input type="checkbox" name="replace-confirm" value="1">
      Auto replace file
    </label>
  </div>

  <button type="submit" name="submit-btn">Send</button>
</form>

<?php $files = get_uploaded_files(); ?>
<?php if (count($files) > 0): ?>
  <h2>Upload folder contents:</h2>
  <table>
    <thead>
    <tr>
      <th>Size</th>
      <th>Filename</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($files as $file): ?>
      <tr>
        <td>
          <?php echo $file['size']; ?>
        </td>
        <td>
          <?php echo $file['name']; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>
</body>
</html>