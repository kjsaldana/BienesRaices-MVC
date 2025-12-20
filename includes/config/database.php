<?php

function conectarDB(): mysqli
{
    // $db = new mysqli('localhost', 'root', '', 'bienesraices_crud');

    $db = new mysqli(
        $_ENV['DB_HOST'] ?? '',
        $_ENV['DB_USER'] ?? '',
        $_ENV['DB_PASS'] ?? '',
        $_ENV['DB_NAME'] ?? ''
    );

    if (!$db) {
        echo 'Error de conexion';
        exit;
    }
    return $db;
}


// $sql = 'SELECT * FROM vendedores';
// $conexion = mysqli_query($db, $sql);
// mysqli_close($db);