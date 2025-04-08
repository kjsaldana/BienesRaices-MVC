<?php
namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PropiedadController {
    public static function index(Router $router) {
        $id = $_GET['id']?? null;
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        
        $router->render('propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'id' => $id
        ]);
    }
    
    public static function create(Router $router) {
        $propiedad = new Propiedad();
        $vendedores = Vendedor::all();
        $errores = Propiedad::getErrors();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $propiedad = new Propiedad($_POST['propiedad']);
        
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';
            
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImage($nombreImagen);
            }
        
            $errores = $propiedad->validar();
            
            if (empty($errores)) {
        
                if (!is_dir(FUNCTIONS_IMAGENES)) {
                    mkdir(FUNCTIONS_IMAGENES);
                }
        
                $imagen->save(FUNCTIONS_IMAGENES . $nombreImagen);
                $propiedad->guardar();
            }    
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function update(Router $router) {
        $id = validateUrl('/admin');

        $propiedad = Propiedad::find($id);

        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrors();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);
            
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpeg';
            
            if ($_FILES['propiedad']['tmp_name']['imagen']) {
                $manager = new ImageManager(Driver::class);
                $imagen = $manager->read($_FILES['propiedad']['tmp_name']['imagen'])->cover(800, 600);
                $propiedad->setImage($nombreImagen);
            }
            
            $errores = $propiedad->validar();
            
            if (empty($errores)) {
                if (isset($imagen)) {
                    if (!is_dir(FUNCTIONS_IMAGENES)) {
                        mkdir(FUNCTIONS_IMAGENES);
                    }
                    $imagen->save(FUNCTIONS_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
            }  
        }

        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function delete() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $id = $_POST['id'];
            $tipo = $_POST['tipo'];

            if (validarTipoContenido($tipo)) {
                if ($id && $tipo === 'propiedad') {
                    $propiedad = Propiedad::find($id);
                    $propiedad->deleteImage();
                    $resultado = $propiedad->eliminar($id);
                }
            }
        }
    
    }


}