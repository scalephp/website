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

include App\PATH.'/config/factories.php';

return [


    /**
     *
     *
     */
    'scale\kli\cli\io\inputinterface'  => $io('Options'),

    'scale\kli\cli\io\outputinterface' => $io('CLImate'),


    /**
     *
     *
     */
    'executor' => $executor,

    'options'  => $options,

    'output'   => $output,

    'command'  => $command,

    'route'    => $route,

    'task'     => $task,

    'view'     => $view,
];