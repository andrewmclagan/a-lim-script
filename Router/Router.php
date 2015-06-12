<?php namespace TheProblem\Router;

use TheProblem\Application;
use TheProblem\ServiceProviders\Request;
use TheProblem\ServiceProviders\Response;

class Router
{
    /**
     * Namespace of the controllers
     *
     * @var string
     */
    private $namespace = 'TheProblem\Controllers';

    /**
     * path to routes file
     * 
     * @var String
     */
    private $routes_path = __DIR__ . '/routes.php'; 

    /**
     * Arary of routes
     * 
     * @var Array
     */
    private $routes = [];     

    /**
     * HTTP request instance
     *
     * @var TheProblem\ServiceProviders\Request
     */
    private $request;

    /**
     * boot the routes
     *
     * @return void
     */
    public function boot(Request $request)
    {
        $this->request = $request;  // init http request

        $this->initRoutes();        // init routes

        $this->route();             // route the request
    }    

    /**
     * Gather all our routes
     *
     * @return void
     */
    public function initRoutes()
    {    
        require_once $this->routes_path;
    }
    
    /**
     * Recieve a http get route
     *
     * @param  String $route
     * @param  String $controller
     * @param  String $action
     * @return void
     */
    public function get($route, $controller)
    {
        $this->routes[$route] = [
            'route'     => $route,
            'controller'=> $controller,
            'verb'      => 'GET',
        ];
    }

    /**
     * Recieve a http post route
     *
     * @param  String $route
     * @param  String $controller
     * @param  String $action
     * @return void
     */
    public function post($route, $controller)
    {
        $this->routes[$route] = [
            'route'     => $route,
            'controller'=> $controller,
            'verb'      => 'POST',
        ];
    }  

    /**
     * match a route... then Route it!
     *
     * @return void
     */
    public function route()
    {    
        if (array_key_exists($this->request->getPath(), $this->routes))
        {
            $route = $this->routes[$this->request->getPath()];

            if ($this->request->is($route['verb']))
            { 
                $this->resolveAction($route['controller'], $route['route'], $route['verb']);   
            }
            else 
            {    
                throw new \Exception('Hmm.. seems you got your HTTP verbs wrong: '.$route['verb']);
            }
        }
        else 
        {
            Response::view('404');
        }
    }     

    /**
     * Resolve a controller
     *
     * @param  String $controller
     * @return TheProblem\Controllers\Controller
     */
    protected function resolveController($controller)
    {    
        $controller = $this->namespace . '\\' . $controller;

        if (class_exists($controller))
        {
            return new $controller;
        }

        throw new \Exception('Controller does not exist: '.$controller);
    }

    /**
     * Resolve a controllers action
     *
     * @param  String $controller
     * @param  String $action
     * @return void
     */
    protected function resolveAction($controller, $route, $verb)
    {    
        if ($controllerInstance = $this->resolveController($controller))
        {
            $controllerMethod = strtolower($verb) . ucfirst(ltrim($route, '/'));

            if ($route == '/') $controllerMethod = strtolower($verb) . 'Index';

            if (method_exists($controllerInstance,  $controllerMethod))
            {
                return $controllerInstance->$controllerMethod();
            }
        }
    }    
}