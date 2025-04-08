<?php
namespace Controller;

use Model\Propiedad;
use Model\Vendedor;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
    public static function index(Router $router) {
        $inicio = true;
        $propiedades = Propiedad::all(3);

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router) {
        $router->render('paginas/nosotros', []);
    }
    
    public static function propiedades(Router $router) {
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades,
        ]);
    }

    public static function propiedad(Router $router) {
        $id = validateUrl('/admin');
        $propiedad = Propiedad::find($id);
        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);    
    }    


    public static function blog(Router $router) {
        $router->render('paginas/blog', [
        ]);    
    }

    public static function entrada(Router $router) {
        $router->render('paginas/entrada', [
        ]);    
    }

    public static function contacto(Router $router) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $respuesta = $_POST['contacto'];
            $mail = new PHPMailer();

            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '34e965664088a8';
            $mail->Password = '9b99592be81cb7';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';

            $mail->setFrom('admin@mvc.com');
            $mail->addAddress('admin@mvc.com', 'BienesRaices');
            $mail->Subject = 'Nuevo Mensaje';

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            $contenido = '<html><p>Nuevo mensaje</p>';
            $contenido .= '<p>Nombre : ' . $respuesta['nombre'] . '</p>';
            $contenido .= '<p>Email : ' . $respuesta['email'] . '</p>';
            $contenido .= '<p>Movil : ' . $respuesta['movil'] . '</p>';
            $contenido .= '<p>Mensaje : ' . $respuesta['mensaje'] . '</p>';
            $contenido .= '<p>Compra/Venta : ' . $respuesta['tipo'] . '</p>';
            $contenido .= '<p>Precio : €' . $respuesta['precio'] . '</p>';
            $contenido .= '<p>Fecha : ' . $respuesta['fecha'] . '</p>';
            $contenido .= '<p>Hora : ' . $respuesta['hora'] . '</p>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Alt. texto';

            if ($mail->send()) {
                echo 'Enviado correctamente';
            }else {
                echo 'Error al ser enviado';
            }
        }
            
        $router->render('paginas/contacto', [
        ]);    
    }

    
}