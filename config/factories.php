<?php namespace App;

$container = function() {
    return new \Scale\Kernel\Core\Container();
};
/**
 * @return Environment
 */
$environment = function () {
    return new \Scale\Kernel\Core\Environment;
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
$io = function ($name) {
    return (new \Scale\Cli\CLI\IO\IO())->factory($name);
};

/**
 *
 */
$input = function ($name = 'Options') use ($io) {
    return $io($name);
};

/**
 *
 */
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
$response = function ($env) {
    return (new \Scale\Http\HTTP\IO\ResponseFactory())->factory($env);
};

/**
 *
 */
$request = function ($env) {
    return (new \Scale\Http\HTTP\IO\RequestFactory())->factory($env);
};

/**
 *
 */
$task = function ($name) {
    return (new \Scale\Cli\CLI\Bin\TaskFactory())->factory($name);
};

/**
 *
 */
$controller = function ($name) {
    return (new \Scale\Kernel\Core\Factory())->factory($name);
};

/**
 * @return Command
 */
$command = function ($input = null, $task = null) {
    return new \Scale\Cli\CLI\Command($input, $task);
};

/**
 * @return Router
 */
$router = function ($request = null, $response = null, $controller = null) {
    return new \Scale\Http\HTTP\Router($request, $response, $controller);
};

/**
 *
 */
$executor = function () use (
    $router,
    $command,
    $request,
    $response,
    $controller,
    $input,
    $task
) {
    $env = new \Scale\Kernel\Core\Environment();
    $api = $env->getApi();

    if ($api === 'http') {
        return $router($request($env), $response($env), $controller);
    } elseif ($api === 'cli') {
        return $command($input(), $task);
    }
};

/**
 * @return Application
 */
$application = function (\Scale\Kernel\Interfaces\ExecutorInterface $executor) {
    return new \Scale\Kernel\Core\Application($executor);
};