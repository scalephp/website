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
$input = function ($env) {
    return new \Scale\Cli\CLI\IO\Provider\Options($env);
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
$output = function ($name = null) use ($io) {
    $name = ($name) ?: '\Scale\Cli\CLI\IO\Provider\CLImate';
    return (new \Scale\Kernel\Core\Factory())->factory($name);
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
$task = function ($name, $input, $output, $view) {
    return (new \Scale\Cli\CLI\Bin\TaskFactory())->factory($name, $input, $output, $view);
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
$command = function ($input = null, $output = null, $task = null, $view = null) {
    return new \Scale\Cli\CLI\Command($input, $output, $task, $view);
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
    $output,
    $task,
    $view
) {
    $env = new \Scale\Kernel\Core\Environment();
    $api = $env->getApi();

    if ($api === 'http') {
        return $router($request($env), $response($env), $controller);
    } elseif ($api === 'cli') {
        return $command($input($env), $output(), $task, $view);
    }
};

/**
 * @return Application
 */
$application = function (\Scale\Kernel\Interfaces\ExecutorInterface $executor) {
    return new \Scale\Kernel\Core\Application($executor);
};