<?php

$application = function (\Scale\Kernel\Interfaces\ExecutorInterface $executor) {

    return new \Scale\Kernel\Core\Application($executor);
};

$router = function ($uri = true, $params = true, $request = null, $controller = null) {

    return new \Scale\Http\HTTP\Router($uri, $params, $request, $controller);
};

/**
 *
 */
$command = function ($name = true, $params = true, $input = null, $task = null) {

    return new \Scale\Kli\CLI\Command($name, $params, $input, $task);
};

/**
 *
 */
$io = function ($name) {

    return (new \Scale\Kli\CLI\IO\IO())->factory($name);
};

/**
 *
 */
$options = function ($name = 'Options') use ($io) {

    return $io($name);
};

/**
 *
 */
$output = function ($name = 'CLImate') use ($io) {

    return $io($name);
};

/**
 *
 */
$task = function ($name) {

    return (new \Scale\Kli\CLI\Bin\TaskFactory())->factory($name);
};

/**
 *
 */
$view = function ($file = null, $data = null, $ns = null) {

    return new \Scale\Kernel\Core\View($file, $data, $ns);
};

/**
 *
 */
$controller = function ($name) {

    return (new \Scale\Http\HTTP\ControllerFactory())->factory($name);
};

$request = function ($env) {
    return (new \Scale\Http\HTTP\IO\RequestFactory())->factory($env);
};

/**
 *
 */
$executor = function (
    $subject = true,
    $params = true
) use (
    $router,
    $command,
    $request,
    $controller,
    $options,
    $task
) {
    $env = new Scale\Kernel\Core\Environment();
    $api = $env->getApi();

    if ($api === 'http') {
        return $router($subject, $params, $request($env), $controller);

    } elseif ($api === 'cli') {

        return $command($subject, $params, $options(), $task);
    }
};
