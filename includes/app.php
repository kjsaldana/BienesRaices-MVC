<?php

use Dotenv\Dotenv;

require __DIR__ . '/functions.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$db = conectarDB();
use Model\ActiveRecord;

ActiveRecord::setDB($db);


