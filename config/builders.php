<?php
/**
 * DI Builders
 *
 * In this file you specify the concrete dependencies for the application.
 * Each row in the array is keyed by the resource name, and its value is
 * a Closure which provides the instructions on how to build the object.
 *
 * These closures are known here as builders, and they are injected to an
 * object so it knows what objects to create. The client object is bound
 * only to the interface, not the implementation behind it.
 *
 * @package    App
 * @category   Base
 * @author     Kli Team
 */

include 'factories.php';

return [


    /**
     *
     *
     */
    'scale\kernel\interfaces\executorinterface' => $executor,

    'scale\http\http\io\requestinterface' => $request,

    'scale\http\http\io\responseinterface' => $response,

    'scale\cli\cli\io\inputinterface'  => $input,

    'scale\cli\cli\io\outputinterface' => $output,

    'league\climate\util\writer\writerinterface'=> new League\CLImate\Util\Writer\StdOut(),


    /**
     *
     *
     */
    'container'   => $container,

    'environment' => $environment,

    'application' => $application,

    'executor'    => $executor,

    'options'     => $options,

    'input'       => $input,

    'output'      => $output,

    'command'     => $command,

    'router'      => $router,

    'task'        => $task,

    'controller'  => $controller,

    'view'        => $view,
];
