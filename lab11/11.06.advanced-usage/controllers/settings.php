<?php

date_default_timezone_set('Asia/Riyadh');
session_start();

define('CPIT_HOST', 'localhost');
define('CPIT_USER', 'root');
define('CPIT_PASS', '123');
define('CPIT_DB', 'cpit405_lab11');

require_once __DIR__.'/../models/Connection.php';
require_once __DIR__.'/../models/Customer.php';

Connection::get_instance(CPIT_HOST, CPIT_USER, CPIT_PASS, CPIT_DB);

$data = [
  /**
   * we assume that lab11 is stored in www folder (c:/wamp/www/lab11) or in mac/linux (/var/www/lab11)
   * Change following line according to your setup and lab11 location starting after root folder.
   */
  'base' => '/lab11/11.06.advanced-usage'
];

if ($_SERVER['PHP_SELF'] == $data['base'].'/index.php' && !is_login()) {
  header("Location: {$data['base']}/login.php");
  exit();
}