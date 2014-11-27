<?php namespace App;

/**
 * 
 */
$environment = function () {
    return new Scale\Kernel\Core\Environment;
};

/**
 * 
 */
$application = function (\Scale\Kernel\Interfaces\ExecutorInterface $executor) {

    return new \Scale\Kernel\Core\Application($executor);
};

/**
 * 
 */
$router = function ($request = null, $controller = null) {

    return new \Scale\Http\HTTP\Router($request, $controller);
};

/**
 *
 */
$command = function ($input = null, $task = null) {

    return new \Scale\Kli\CLI\Command($input, $task);
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
$input = function ($name = 'Options') use ($io) {

    return $io($name);
};

$options = function () use ($io) {
    
    return $io('Options');
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

    return (new \Scale\Http\HTTP\ControllerFactory("/var/www/cyrgit/framework"))->factory($name);
};

$request = function ($env) {
    return (new \Scale\Http\HTTP\IO\RequestFactory())->factory($env);
};

/**
 *
 */
$executor = function () use (
    $router,
    $command,
    $request,
    $controller,
    $input,
    $task
) {
    $env = new \Scale\Kernel\Core\Environment();
    $api = $env->getApi();

    if ($api === 'http') {
        return $router($request($env), $controller);

    } elseif ($api === 'cli') {

        return $command($input(), $task);
    }
};
