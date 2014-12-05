<?php

/**
 * Create and bind socket
 */
$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Could not create socket\n");
socket_bind($socket, '127.0.0.1', 8081) or die("Could not bind to socket\n");
socket_listen($socket, 3) or die("Could not set up socket listener\n");

/**
 * IO timeout watcher
 */
$timeout_watcher = new EvTimer(10.0, 0., function () use ($socket) {
    socket_close($socket);
    Ev::stop(Ev::BREAK_ALL);
});

/**
 * Load a new Scale Application
 */
$container = require 'bootstrap.php';

$app = $container->constructInject('\Scale\Kernel\Core\Webapp');
$executor = $app->getExecutor();
$container->inform($executor);

/**
 * Monitor socket read events in loop
 */
$read_watcher = new EvIo($socket, Ev::READ, function ($w, $re)
        use ($socket, $app, $executor, $timeout_watcher)
{
    // Stop timeout watcher
    $timeout_watcher->stop();

    // Stop write watcher
    $w->stop();

    // Connect and read from the client
    $client = socket_accept($socket) or die("Could not accept incoming connection\n");
    $input = socket_read($client, 1024) or die("Could not read input\n");

    if ($input) {

        // Use input to run executor
        $data = serialize(
            $app->setExecutor(
                $executor->setInput(
                    unserialize($input)
                )
            )->execute()
        );

        // Send response and close socket
        socket_write($client, $data, strlen($data)) or die("Could not write output\n");
        socket_close($client);
    }
});

// Run main loop
Ev::run();

// Shutdown server
socket_close($socket);
