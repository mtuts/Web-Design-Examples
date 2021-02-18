<!DOCTYPE html>
<html>
<head><title>PHP From Handler</title></head>
<body>


<form action="handler.php" method="post">
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
      <input type="checkbox" name="favorite-os[]" value="dos">
      MS DOS
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="3.11">
      Windows 3.11
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="me">
      Windows Me
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="98">
      Windows 98
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="xp">
      Windows xp
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="8.1">
      Windows 8.1
    </label>
    <label>
      <input type="checkbox" name="favorite-os[]" value="10">
      Windows 10
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
    <label for="map">
      Choose from image
      <input type="image" name="map" src="images/saudi-map.gif" width="600">
    </label>
  </div>
</form>
</body>
</html>