<?php

use TheProblem\Application;

/**
 * Application Boostrap
 *
 * @author Andrew McLagan <andrewmclagan@gmail.com>
 * @package the-problem
 * @version 0.1.0 
 */

/*
|--------------------------------------------------------------------------
| Run application
|--------------------------------------------------------------------------
*/

require __DIR__ . '/../vendor/autoload.php'; // run composer autoload

global $app;

$app = new Application;

$app->boot();

