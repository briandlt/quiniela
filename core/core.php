<?php

    #Constantes de Conexion
    define('DB_DSN', 'mysql:host=localhost; dbname=quiniela');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_CHARSET', 'SET CHARACTER SET utf8');

    #Rutas
    define('SERVER', 'http://localhost/quiniela/');
    define('RAIZ', $_SERVER['DOCUMENT_ROOT'].'/quiniela');
    define('CSS', SERVER.'css/');
    define('JS', SERVER.'js/');
    define('VIEWS', SERVER.'views/');
    define('CONTROLLERS', SERVER.'controllers/');
    define('MODELS', SERVER.'models/');

    #Constantes de encriptacion
    define('METHOD', 'AES-256-CBC');
    define('SECRET_KEY', '$TD@2018');
    define('SECRET_IV', '221192');