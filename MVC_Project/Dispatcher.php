<?php

namespace MVC_Project;

use MVC_Project\Request;
use MVC_Project\Router;

class Dispatcher
{
    private $request;

    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    public function loadController()
    {
        $file = 'MVC_Project\\Controllers\\' . ucfirst($this->request->controller) . "Controller";
        $controller = new $file();

        return $controller;
    }

}
