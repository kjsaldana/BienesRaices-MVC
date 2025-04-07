<?php
namespace Controller;

use Model\Vendedor;
use MVC\Router;

class VendedorController {
    public static function create(Router $router) {
        $vendedor = new Vendedor();
        $errores = $vendedor->getErrors();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor = new Vendedor($_POST['vendedor']);
            $errores = $vendedor->validar();
            
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router) {
        $id = validateUrl('/admin');

        $vendedor = Vendedor::find($id);
        $errores = $vendedor->getErrors();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $args = new Vendedor($_POST['vendedor']);
            $vendedor->sincronizar($args);
            $errores = $vendedor->validar();
            
            if (empty($erorres)) {
                $vendedor->guardar();
            }
        
        }



    
        $router->render('vendedores/actualizar', [
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);
    }
    
    public static function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = validateUrl('/admin');

            $tipo = $_POST['tipo'];

            if (validarTipoContenido($tipo)) {
                if ($id && $tipo === 'vendedor') {
                    $id = $_POST['id'];
                    $vendedor = Vendedor::find($id);
                    $resultado = $vendedor->eliminar($id);
                }
            }
        }
    
    }


}