<?php

require 'vendor/autoload.php';

use Scale\Kernel\Core\Environment;
use Scale\Cli\CLI\Command;
use Scale\Cli\CLI\Bin\Run\SocketRunner;
use Scale\Cli\CLI\IO\Provider\Output;
use Scale\Cli\CLI\IO\Provider\Options;
use Scale\Kernel\Core\View;

/**
 * Load environment
 */
$env = new Environment;
$input = new Options($env);
$output = new Output;

/**
 * Define custom closure for SocketRunner task
 */
$task = function($uri) use ($env, $input, $output) {

    $view = function($name){
        return new View($name);
    };

    $r = new SocketRunner($input, $output, $view);

    $r->uri = $uri;

    return $r;
};

/**
 * Instantiate new command
 */
$command = new Command($input, $output, $task);

/**
 * Execute non-blocking socket runner
 */
$command->prepare()->execute();





