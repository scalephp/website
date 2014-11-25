<?php 

require 'bootstrap.php';

$container = new Scale\Kernel\Core\Container(__DIR__);

$app = $container->constructInject('\Scale\Kernel\Core\Application');

$app->execute();
