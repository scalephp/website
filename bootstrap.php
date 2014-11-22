<?php namespace App;

const PATH =  __DIR__;

require 'vendor/autoload.php';
require 'vendor/scalephp/kernel/bootstrap.php';
require 'vendor/scalephp/kli/bootstrap.php';
require 'vendor/scalephp/http/bootstrap.php';

//ini_set('', '');

date_default_timezone_set('UTC');

set_exception_handler(array('\\Scale\\Kernel\\Core\\RuntimeException', 'handler'));

$api = (PHP_SAPI == 'cli' || PHP_SAPI == 'cli-server') ? 'cli' : 'http';

return new \Scale\Kernel\Core\Application($api);
