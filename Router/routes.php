<?php 

use TheProblem\Application;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
*/

Application::resolve('router')->get('/', 'IndexController');

Application::resolve('router')->get('/readMe', 'IndexController');

Application::resolve('router')->post('/processData', 'IndexController');
