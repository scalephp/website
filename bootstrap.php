<?php namespace App;

use Scale\Kernel\Core\Container;
use Scale\Kernel\Core\Path;

/**
 *  Anchor path for the application
 */
const PATH =  __DIR__;

/**
 * Load Composer packages and run sub-bootstraps
 */
require 'vendor/autoload.php';
//require 'vendor/scalephp/kernel/bootstrap.php';
//require 'vendor/scalephp/cli/bootstrap.php';
//require 'vendor/scalephp/http/bootstrap.php';

/**
 *
 * @link http://php.net/manual/en/function.set-exception-handler.php
 */
set_exception_handler(['\Scale\Kernel\Core\RuntimeException', 'handler']);

/**
 *
 *
 */
return (new Container(new Path(__DIR__.'/')))
    ->constructInject('\Scale\Kernel\Core\Application');
