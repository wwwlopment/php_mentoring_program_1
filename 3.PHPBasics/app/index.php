<?php

/**
 * 1 - Debug on
 * 0 - Debug off
 */
const DEBUG = 1;

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}else{
    error_reporting(0);
    ini_set('display_errors', 0);
}

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/controllers/MainController.php');

$main = new MainController();
$main->actionIndex();