<?php

session_start(); // starting session should be the first line before writing anything to output

?><!DOCTYPE html>
<html>
<head><title>COOKIES</title></head>
<body>
<?php

if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];

    unset($_SESSION['error']);
}

?>
<form action="login.php" method="post">
    <div>
        <label>
            Username:
            <input type="text" name="username">
        </label>
    </div>

    <div>
        <label>Password: <input type="password" name="pass"></label>
    </div>

    <button type="submit">Login</button>
</form>


</body>
</html>