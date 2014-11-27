<?php namespace App;

const PATH =  __DIR__;

require 'vendor/autoload.php';
require 'vendor/scalephp/kernel/bootstrap.php';
require 'vendor/scalephp/kli/bootstrap.php';
require 'vendor/scalephp/http/bootstrap.php';

date_default_timezone_set('UTC');
set_exception_handler(array('\\Scale\\Kernel\\Core\\RuntimeException', 'handler'));

$container = new Scale\Kernel\Core\Container(__DIR__);

return $container->constructInject('\Scale\Kernel\Core\Application');
