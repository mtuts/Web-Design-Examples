<?php
    require_once __DIR__.'/controllers/settings.php';
    include __DIR__.'/views/header.php';
?>
    <div class="post">
      <div class="header">
        <h2> Registered Customers</h2>
        <p><span>Last update</span> <?php echo date('jS M. Y h:i:s a'); ?></p>
      </div>
      <div class="content">


        <?php
        if (isset($_SESSION['edit_mode']) && $_SESSION['edit_mode']) {
          include __DIR__.'/views/success_error.php';
        }

          $customers = get_customers();

          $count = count($customers);


        ?>
        <?php if ($count > 0): ?>
        <table class="striped">
          <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Last Login</th>
            <th>Option</th>
          </tr>
          </thead>

          <tbody>
        <?php foreach ($customers as $item): ?>
          <tr>
            <td><?php echo $item['id']; ?></td>
            <td><?php echo $item['first_name']; ?></td>
            <td><?php echo $item['last_name']; ?></td>
            <td><?php echo $item['email']; ?></td>
            <td><?php echo date('D M j, Y', strtotime($item['birth_date'])); ?></td>
            <td><?php echo $item['gender'] ? 'Male' : 'Female'; ?></td>
            <td><?php echo is_null($item['phone']) ? 'N/A': $item['phone']; ?></td>
            <td><pre><?php echo is_null($item['address']) ? 'N/A': $item['address']; ?></pre></td>
            <td><?php echo date('d / m / Y h:i:s A', strtotime($item['last_update'])); ?></td>
            <td>
              <a href="<?php echo $data['base']; ?>/edit.php?id=<?php echo $item['id']; ?>">Edit</a>
              |
              <a class="delete-customer" href="<?php echo $data['base']; ?>/controllers/customer.php?delete=<?php echo $item['id']; ?>">Delete</a>
            </td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
        <?php else: ?>
          <p><strong>There are no customers yet!</strong></p>
        <?php endif; ?>
      </div>
    </div>



    <form id="customer-form" class="basic-form" action="<?php echo $data['base'] ?>/controllers/customer.php" method="post">
      <h2>New Customer</h2>


      <?php
      if (isset($_SESSION['edit_mode']) && !$_SESSION['edit_mode']) {
        include __DIR__.'/views/success_error.php';
      }
      ?>

      <div class="form-entry">
        <label for="first-name-field">First Name</label>
        <input type="text" id="first-name-field" name="first-name" value="<?php echo $_SESSION['first-name']; ?>" placeholder="Enter first name" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="last-name-field">Last Name</label>
        <input type="text" id="last-name-field" name="last-name" value="<?php echo $_SESSION['last-name']; ?>" placeholder="Enter last name" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="email-field">Email</label>
        <input type="email" id="email-field" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Enter email" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="pass-field">Password</label>
        <input type="password" id="pass-field" name="pass" value="" placeholder="Enter password" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="confirm-pass-field">Confirm Password</label>
        <input type="password" id="confirm-pass-field" name="confirm-pass" value="" placeholder="Enter Confirm Password" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="birth-field">Birth Date</label>
        <input type="date" id="birth-field" name="birth" value="<?php echo $_SESSION['birth']; ?>" placeholder="Enter your birth date" required>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <div class="label">Gender</div>
        <input type="radio" id="male-gender" name="gender" value="male" <?php if ($_SESSION['gender'] == 'male'): ?>checked<?php endif; ?>>
        <label for="male-gender" class="skip-label">Male</label>

        <input type="radio" id="female-gender" name="gender" value="female" <?php if ($_SESSION['gender'] == 'female'): ?>checked<?php endif; ?>>
        <label for="female-gender" class="skip-label">Female</label>
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="phone-field">Phone Number</label>
        <input type="tel" id="phone-field" name="phone" value="<?php echo $_SESSION['phone']; ?>" placeholder="Enter your phone number">
        <div class="clear"></div>
      </div>

      <div class="form-entry">
        <label for="address-field">Address</label>
        <textarea id="address-field" name="address" placeholder="Enter Your Address"><?php echo $_SESSION['address']; ?></textarea>
        <div class="clear"></div>
      </div>

      <div class="form-submit">
        <input type="submit" value="Publish">
        <button type="reset">Reset</button>
      </div>

    </form>

<?php

include __DIR__.'/views/footer.php';