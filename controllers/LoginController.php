<?php

namespace Controller;

use Model\Admin;
use MVC\Router;

class LoginController{
    
    public static function login(Router $router){
        $errores = [];
        $login = true;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Admin($_POST['login']);
            $errores = $usuario->validar();

            if (empty($errores)) {
                $resultado = $usuario->userExists();

                if (!$resultado) {
                    $errores = Admin::getErrors();
                }else{

                    $autenticado = $usuario->checkPassword($resultado);

                    if ($autenticado) {
                        $usuario->authorize();
                    }else{
                        $errores = Admin::getErrors();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores,
            'login' => $login
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
        header('location: /');
    }

}