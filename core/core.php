<?php

    #Constantes de Conexion
    define('DB_DSN', 'mysql:host=sql3.freesqldatabase.com; dbname=sql3299823');
    define('DB_USER', 'sql3299823');
    define('DB_PASS', 'hpsYG2SHqT');
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

    date_default_timezone_set("America/Mexico_City");
