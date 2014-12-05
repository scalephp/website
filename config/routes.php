<?php

/**
 * List of routes to interpret by the front controller, maps a the input paramter
 * "location" to an array here. This array contains the information on how to process
 * that request, including which Controller and method to use.
 */

return [
    '/' => [
        'controller' => '\\App\\HTTP\\HTML\\Run\\Index',
        'action' => 'index',
        'ttl' => false,
        'params' => []
    ],
    '/index' => [
        'controller' => '\\App\\HTTP\\HTML\\Run\\Index',
        'action' => 'index',
        'ttl' => false,
        'params' => []
    ],

    '/api' => [
        'controller' => '\\App\\HTTP\\JSON\\Run\\API',
        'action' => 'index',
        'ttl' => false,
        'params' => []
    ],
];
