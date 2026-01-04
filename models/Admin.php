<?php

namespace Model;

class Admin extends ActiveRecord{
    protected static $tabla = 'usuarios';
    protected static $columnaDB = ['id', 'email', 'password'];

    public $id;
    public $email;
    public $password;

    function __construct($args =[]){
        $this->id = $args['id']?? null;
        $this->email = $args['email']?? '';
        $this->password = $args['password']?? '';
    }

    public function validar(){
        if (!$this->email) {
            self::$errores[] = 'Email obligatorio';
        }
        if (!$this->password) {
            self::$errores[] = 'Contraseña obligatoria';
        }
        return self::$errores;
    }

    public function userExists(){
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '{$this->email}' ";
        $resultado = self::$db->query($query);
        if (!$resultado->num_rows) {
            self::$errores[] = 'Usuario no existe';
            return;
        }
        return $resultado;
    }

    public function checkPassword($resultado){
        $usuario = $resultado->fetch_object();
        $autenticado = password_verify($this->password, $usuario->password);
        if (!$autenticado) {
            self::$errores[] = 'Contraseña Incorrecta';
            return;
        }
        return $autenticado;
    }

    public function authorize(){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['usuario'] = $this->email;
        $_SESSION['auth'] = true;
        header('location: /admin?id=4');
    }
}