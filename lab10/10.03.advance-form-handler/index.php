<!DOCTYPE html>
<html>
<head>
  <title>PHP From Handler</title>
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

<?php

if (isset($_GET['error'])) {
  echo "<h3 class='error'>{$_GET['error']}</h3>";
}
?>

<form action="action/handler.php" method="post">
  <input type="hidden" name="started-time" value="<?php echo time(); ?>">
  <div>
    <label>First Name: <input type="text" name="first-name"></label>
  </div>
  <div>
    <label>Last Name: <input type="text" name="last-name"></label>
  </div>
  <div>
    <label>Email: <input type="email" name="email"></label>
  </div>
  <div>
    <label>Password: <input type="password" name="pass"></label>
  </div>
  <div>
    <label>Confirm Password: <input type="password" name="re-pass"></label>
  </div>
  <div>
    Gender
    <label>
      <input type="radio" name="gender" value="male">
      Male
    </label>
    <label>
      <input type="radio" name="gender" value="female">
      Female
    </label>
  </div>
  <div>
    Favorite OS:
    <label>
      <input type="checkbox" name="favorite-os[]" value="ms windows">
      MS Windows
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="linux">
      Linux
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="osx">
      OSX
    </label>
  </div>

  <div>
    <label for="city">
      City
    </label>
    <select name="city" id="city">
      <option value="makkah">Makkah</option>
      <option value="madina">Madina</option>
      <option value="jeddah">Jeddah</option>
    </select>
  </div>
  <div>
    <label for="list">
      Choose from list
    </label>
    <select name="list[]" id="list" multiple>
      <option value="item1">Item 1</option>
      <option value="item2">Item 2</option>
      <option value="item3">Item 3</option>
    </select>
  </div>
  <div>
    <label>Choose your favorite color: <input type="color" name="color"></label>
  </div>
  <div>
    <label>Birth date: <input type="date" name="birth-date"></label>
  </div>
  <div>
    <label>Choose number: <input type="range" name="favorite-number" min="1" max="20" value="10"></label>
  </div>
  <div>
    <label>Phone: <input type="tel" name="phone" ></label>
  </div>
  <div>
    <label>Your website: <input type="url" name="website" ></label>
  </div>

  <div>
    <label for="Note">
      <textarea name="note" id="note" cols="30" rows="10"></textarea>
    </label>
  </div>

  <div>
    <label>
      <input type="checkbox" name="agree" value="1" required>
      I agree that I entered correct info.
    </label>
  </div>

  <div>
    <button type="submit">Send</button>
  </div>
</form>
</body>
</html>