<?php
    $jornada = isset($_POST['jornada'])? $_POST['jornada']: "null";
    $jornadaResult = isset($_POST['jornadaResults'])? $_POST['jornadaResults']: "null";
    $jornadaInicio = isset($_POST['jornadaInicio'])? $_POST['jornadaInicio']: "null";
    $jornadaResCorrect = isset($_POST['jornadaResCorrect'])? $_POST['jornadaResCorrect']:"null";
    
    
    $quiniela = new Quiniela;
    $jornadaActiva = $quiniela->obtenerFormJornada();

    if($jornada != 'null'){
        $obtenerJornada = $quiniela->obtenerJornada($jornada);
    }elseif($jornadaResult != 'null'){
        $obtenerResultados = $quiniela->getResults($jornadaResult);
    }elseif($jornadaInicio != 'null'){
        $obtenerResultados = $quiniela->getResults($jornadaInicio);
    }elseif($jornadaResCorrect != 'null'){
        $obtenerResultadosCorrectos = $quiniela->getResultsCorrect($jornadaResCorrect);
    }


    
    require_once './views/home.view.php';