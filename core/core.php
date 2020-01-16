<?php

    #Constantes de Conexion
    define ( ' DB_DSN ' , ' mysql: host = db4free.net ; dbname = quinielamamalona ' );
    define ( ' DB_USER ' , ' briandlt ' );
    define ( ' DB_PASS ' , ' bedlt221192 ' );
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
