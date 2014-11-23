<?php 

require 'bootstrap.php';

$container = new \Scale\Kernel\Core\Container;

$app = $container->constructInject('\Scale\Kernel\Core\Application');

$app->execute();
