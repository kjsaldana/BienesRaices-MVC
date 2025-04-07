<?php

require __DIR__ . '/functions.php';
require __DIR__ . '/config/database.php';
require __DIR__ . '/../vendor/autoload.php';

$db = conectarDB();
use Model\ActiveRecord;

ActiveRecord::setDB($db);


