<?php if (isset($_SESSION['error'])):  ?>
  <ul class="error">

    <?php foreach ($_SESSION['error'] as $item):  ?>
      <li><?php echo $item; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<?php if (isset($_SESSION['success'])):  ?>
  <ul class="success">

    <?php foreach ($_SESSION['success'] as $item):  ?>
      <li><?php echo $item; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>


<?php
unset($_SESSION['error'], $_SESSION['success']); // clear error and success

?>
