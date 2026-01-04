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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $protectedRoutes = ['/admin','/propiedades/eliminar','/propiedades/crear','/propiedades/actualizar','/vendedores/eliminar','/vendedores/crear','/vendedores/actualizar'];

        $actualUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method === 'GET') {
            $fn = $this->routesGET[$actualUrl]?? null;
        }elseif($method === 'POST') {
            $fn = $this->routesPOST[$actualUrl]?? null;
        }

        if (in_array($actualUrl, $protectedRoutes) && !$auth) {
            header('location: /');
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
