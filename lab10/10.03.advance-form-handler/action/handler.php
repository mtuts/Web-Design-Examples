<?php

/**
 * Following two lines are for debugging
 */
//print '<pre>';
//print_r($_POST);  // $_POST is array of all fields sent using get method.


if (isset($_POST['first-name'], $_POST['last-name'], $_POST['email'], $_POST['pass'], 
	$_POST['re-pass'], $_POST['agree'])) {

  $first_name = $_POST['first-name'];
  $last_name = $_POST['last-name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $re_pass = $_POST['re-pass'];
  $gender = $_POST['gender'];
  $os = isset($_POST['favorite-os']) && is_array($_POST['favorite-os']) ? 
  	implode("-", $_POST['favorite-os']) : '';
  $city = $_POST['city'];
  $list = isset($_POST['list']) && is_array($_POST['list']) ? 
  					implode("-", $_POST['list']) : '';
  $color = $_POST['color'];
  $birth = $_POST['birth-date'];
  $number = $_POST['number'];
  $phone = $_POST['phone'];
  $website = $_POST['website'];
  $note = $_POST['note'];

  if ($pass != $re_pass) {
    // writing to header should be the first line before writing anything to output or 
    // any print/echo
    header('Location: ../index.php?error=' . urlencode('Confirm password, both should " 
    		." be equals!'));
    exit(); // to exit from this file
  }

  $fp = fopen(__DIR__.'/../data/info.txt', 'a+');
  fwrite($fp, "{$first_name},{$last_name},{$email},{$pass},{$gender},{$os},{$city}"
  			 .",{$list},{$color},{$birth},{$number},{$phone},{$website},{$note}\n");

  fclose($fp);

  header('Location: ../result.php');
} else {
  header('Location: ../index.php?error=' . urlencode('Please fill all required data'));
}
