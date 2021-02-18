<?php


/**
 * here we want to see all form request using $_GET or $_POST
 */

print '<pre>';
print_r($_GET);  // $_GET is array of all fields sent using get method. This way is 
				 // not secure to send password for example.



/**
 * Now change method to POST and test following
 */

print '<pre>';
print_r($_POST);  // $_POST is array of all fields sent using get method.
