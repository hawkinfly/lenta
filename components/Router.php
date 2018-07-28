<?php
    class Router {
        private $routes;
        private $controller;
        public function __construct()
        {
            $routes_path = ROOT . '/config/routes.php';
            $this->routes = include_once $routes_path;
        }
        // получение uri
        private function getUri()
        {
            $uri_arr = explode('?', $_SERVER['REQUEST_URI'], 2);
            if ($uri_arr[0] === '/') $uri_arr[0] .= 'news.php';
            return substr($uri_arr[0], 1);
        }
        // установка контроллера
        private function setController($uri){
            if (array_key_exists($uri, $this->routes)) {
                $controller =  $this->routes[$uri];
                $controller_path = ROOT . '/controllers/' . $controller;
                require_once $controller_path;
                $controller_arr = explode('.', $controller, 2);
                $this->controller = $controller_arr[0];
            } else {
                exit("Ошибка");
            }
        }

        public function run()
        {
            $uri =  $this->getUri();
            $this->setController($uri);
            $controller_object = new $this->controller();
            $controller_object->action();
        }
    }