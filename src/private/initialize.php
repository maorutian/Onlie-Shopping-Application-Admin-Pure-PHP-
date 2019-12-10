<?php

ob_start(); // turn on output buffering

// Assign the root URL to a PHP constant
$public_end = strpos($_SERVER['SCRIPT_NAME'], '/public') + 7;
$doc_root = substr($_SERVER['SCRIPT_NAME'], 0, $public_end);
define("WWW_ROOT", $doc_root);

// Assign file paths to PHP constants
define("PRIVATE_PATH", dirname(__FILE__));
define("PROJECT_PATH", dirname(PRIVATE_PATH));
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

require_once('functions.php');
require_once('db_credentials.php');
require_once('database_functions.php');
require_once('validation_functions.php');
require_once('classes/DatabaseObject.php');
require_once('classes/Product.php');
require_once('classes/Employee.php');
require_once('classes/Session.php');
require_once('classes/Pagination.php');


$db = db_connect();
DatabaseObject::set_database($db);

$session = new Session;
