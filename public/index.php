<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PropiedadController;

$router = new Router();

$router->get('/admin', [PropiedadController::class, 'index']);
$router->post('/propiedad/delete', [PropiedadController::class, 'delete']);

$router->get('/propiedad/crear', [PropiedadController::class, 'create']);
$router->post('/propiedad/crear', [PropiedadController::class, 'create']);

$router->get('/propiedad/actualizar', [PropiedadController::class, 'update']);
$router->post('/propiedad/actualizar', [PropiedadController::class, 'update']);


$router->checkRoutes();