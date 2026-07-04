<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

$appPath = __DIR__ . '/..';

if (file_exists($maintenance = $appPath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $appPath . '/vendor/autoload.php';

$app = require_once $appPath . '/bootstrap/app.php';
$app->handleRequest(Request::capture());
