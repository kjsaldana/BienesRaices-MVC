<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\PropiedadController;
use Controller\VendedorController;

$router = new Router();

$router->get('/admin', [PropiedadController::class, 'index']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'delete']);

$router->get('/propiedades/crear', [PropiedadController::class, 'create']);
$router->post('/propiedades/crear', [PropiedadController::class, 'create']);

$router->get('/propiedades/actualizar', [PropiedadController::class, 'update']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'update']);


$router->get('/vendedores/crear', [VendedorController::class, 'create']);
$router->post('/vendedores/crear', [VendedorController::class, 'create']);

$router->get('/vendedores/actualizar', [VendedorController::class, 'update']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'update']);

$router->post('/vendedores/eliminar', [VendedorController::class, 'delete']);

$router->checkRoutes();