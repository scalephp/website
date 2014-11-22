<?php

/**
 * 
 */
$route = function($uri = true, $params = true)
{
    return new \Scale\Http\HTTP\Router($uri, $params);
};

/**
 * 
 */
$command = function($task = true, $params = true)
{
    return new \Scale\Kli\CLI\Command($task, $params);
};

/**
 * 
 */
$executor = function($api) use ($route, $command)
{
    return ($api === 'http') ? $route : (($api === 'cli') ? $command : null);
};

/**
 * 
 */
$io = function($name)
{
    return (new \Scale\Kli\CLI\IO\IO())->factory($name);
};

/**
 * 
 */
$options = function ($name = 'Options') use ($io)
{
    return $io($name);
};

/**
 * 
 */
$output = function ($name = 'CLImate') use ($io)
{
    return $io($name);
};

/**
 * 
 */
$task = function($name)
{
    return (new \Scale\Kli\CLI\Bin\TaskFactory())->factory($name);
};

/**
 * 
 */
$view = function ($file = null, $data = null, $ns = null)
{
    return new \Scale\Kernel\Core\View($file, $data, $ns);
};
