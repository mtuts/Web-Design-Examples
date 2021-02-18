<?php
/**
 * using functional connection, even though the mysql functional connection is deprecated so the mysqli_connect function
 * return new instance from mysqli class.
 */

/** if the connection information wrong it will fire warning error! where can't be catch using try-catch since we did
 *  not set up the report state using (mysqli_report() ) method with proper parameter.
 */

echo "<pre>";
$conn = mysqli_connect('localhost', 'root', '');


var_dump($conn);


mysqli_close($conn);
