<?php
    require_once __DIR__.'/controllers/settings.php';
    require_once __DIR__.'/controllers/customer.php';

    include __DIR__.'/views/header.php';



?>
    <?php if (isset($info)): ?>


  <?php include __DIR__.'/views/success_error.php';  ?>


    <form id="customer-form" class="basic-form" action="<?php echo $data['base'] ?>/controllers/customer.php" method="post">

      <input type="hidden" name="user_id" value="<?php echo $info['id']; ?>">
      <h2> Update Customer</h2>

      <div class="form-entry">
        <label for="first-name-field">First Name</label>
        <input type="text" id="first-name-field" name="first-name" value="<?php echo (isset($_SESSION['first-name']) ? $_SESSION['first-name'] : $info['first_name']); ?>" placeholder="Enter first name" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="last-name-field">Last Name</label>
        <input type="text" id="last-name-field" name="last-name" value="<?php echo (isset($_SESSION['last-name']) ? $_SESSION['last-name'] : $info['last_name']); ?>" placeholder="Enter last name" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="email-field">Email</label>
        <input type="email" id="email-field" name="email" value="<?php echo (isset($_SESSION['email']) ? $_SESSION['email'] : $info['email']); ?>" placeholder="Enter email" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="pass-field">Password</label>
        <input type="password" id="pass-field" name="pass" value="" placeholder="Enter password if you want change it or keep it as its">
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="confirm-pass-field">Confirm Password</label>
        <input type="password" id="confirm-pass-field" name="confirm-pass" value="" placeholder="Enter Confirm Password">
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="birth-field">Birth Date</label>
        <input type="date" id="birth-field" name="birth" value="<?php echo (isset($_SESSION['birth']) ? $_SESSION['birth'] : $info['birth_date']); ?>" placeholder="Enter your birth date" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <div class="label">Gender</div>
        <input type="radio" id="male-gender" name="gender" value="male" <?php if ($_SESSION['gender'] == 'male' || $info['gender'] == 1): ?>checked<?php endif; ?>>
        <label for="male-gender" class="skip-label">Male</label>

        <input type="radio" id="female-gender" name="gender" value="female" <?php if ($_SESSION['gender'] == 'female' || $info['gender'] == 0): ?>checked<?php endif; ?>>
        <label for="female-gender" class="skip-label">Female</label>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="phone-field">Phone Number</label>
        <input type="tel" id="phone-field" name="phone" value="<?php echo (isset($_SESSION['phone']) ? $_SESSION['phone'] : $info['phone']); ?>" placeholder="Enter your phone number">
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="address-field">Address</label>
        <textarea id="address-field" name="address" placeholder="Enter Your Address"><?php echo (isset($_SESSION['address']) ? $_SESSION['address'] : $info['address']); ?></textarea>
        <div class="clear"></div>
      </div>

      <div class="form-submit">
        <input type="submit" value="Save">
        <a href="<?php echo $data['base']; ?>" class="button">Back</a>
      </div>

    </form>

  <?php else: ?>
  <div class="post">
  <div class="header">
    <h2> Wrong Page</h2>
    <p>You navigate to wrong page.</p>
  </div>
  <div class="content">

  </div>
  </div>
  <?php endif; ?>

<?php

include __DIR__.'/views/footer.php';