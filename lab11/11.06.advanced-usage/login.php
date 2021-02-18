<?php
    require_once __DIR__.'/controllers/settings.php';
    include __DIR__.'/views/header.php';
?>

    <form class="basic-form" action="<?php echo $data['base'] ?>/controllers/login.php" method="post">
      <h2>Login Info</h2>

      <div class="form-entry">
        <label for="username-field">Username</label>
        <input type="email" id="username-field" name="username" value="" placeholder="Enter your email" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="password-field">Password</label>
        <input type="password" id="password-field" name="password" value="" placeholder="Enter your password" required>
        <div class="clear"></div>
      </div>

      <div class="form-submit">
        <input type="submit" value="Login">
      </div>

    </form>

<?php

include __DIR__.'/views/footer.php';