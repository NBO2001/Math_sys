<?php
declare(strict_types=1);

// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);

require_once __DIR__ . '/../vendor/autoload.php';

if (!defined('HOME')) {
    define('HOME', dirname(__DIR__));
}

new Core\RouteCore();
