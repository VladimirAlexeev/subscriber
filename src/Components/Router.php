<?php

namespace src\Components;

use config\Database\Database;
use src\Controller\EmailController;
use src\Repository\EmailRepository;

class Router
{
    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/Routes/routes.php';
        $this->routes = include($routesPath);
    }

    public function run()
    {
        $url = $this->getURL();
        $params = explode('=', $this->getParamsFromURL());

        foreach ($this->routes as $route => $path) {
            //compare config route with url
            if($route === $url || $route === $params[0]) {
                // get controller name
                $segments = explode('/', $path);
                $controllerName = ucfirst(array_shift($segments)).'Controller';
                //get action name
                $actionName = array_shift($segments);
                //connect controller
                $result = $this->connectController($controllerName);
//                $response = $result->$actionName();
                return empty($params[0]) ? $result->$actionName() : $result->$actionName($params[1]);
//                print_r($response);
            }
        }
    }

    private function connectController($controller)
    {
        include_once './config/Database/Database.php';

        $database = new Database();
        $db = $database->getConnection();

        switch ($controller) {
            case 'EmailController':
                include_once('src/Controller/EmailController.php');
                include_once('src/Repository/EmailRepository.php');
                $storage = new EmailRepository($db);
                return new EmailController($storage);
            default:
                throw new \Exception("Controller with name '$controller' does not exist!");
        }
    }

    /**
     * Return requested url
     * @return string
     */
    private function getURL()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }

        return '/';
    }

    /**
     * Return params from url
     * @return string|null
     */
    private function getParamsFromURL()
    {
        if (!empty($_SERVER['QUERY_STRING'])) {
            return $_SERVER['QUERY_STRING'];
        }

        return null;
    }
}