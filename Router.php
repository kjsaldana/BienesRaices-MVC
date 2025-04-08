<?php
namespace MVC;

class Router {
    public $routesGET = [];
    public $routesPOST = [];

    public function get($url, $fn){
        $this->routesGET[$url] = $fn;
    }
    
    public function post($url, $fn){
        $this->routesPOST[$url] = $fn;
    }

    public function checkRoutes() {
        $actualUrl = $_SERVER['PATH_INFO']?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method === 'GET') {
            $fn = $this->routesGET[$actualUrl]?? null;
        }elseif($method === 'POST') {
            $fn = $this->routesPOST[$actualUrl]?? null;
        }
        
        if ($fn) {
           call_user_func($fn, $this);
        }else {
            echo '404 Ups... enlace no existe';

        }
    }

    public function render($view, $datos = []){
        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}
