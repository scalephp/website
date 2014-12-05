<?php

/**
 * Load Container
 */
$container = require 'bootstrap.php';

/**
 * Inject construct Application
 */
$app = $container->constructInject('\Scale\Kernel\Core\Application');

/**
 * Execute it
 */
$response = $app->execute();

/**
 * Render it
 */
$response->render();
