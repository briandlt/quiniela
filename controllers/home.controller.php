<?php
    $jornada = isset($_GET['jornada'])? $_GET['jornada']: 1;
    $jornadaResCorrect = isset($_POST['jornadaResCorrect'])? $_POST['jornadaResCorrect']:"null";
    $user = isset($_POST['user'])? $_POST['user']: 'null';
    $pass = isset($_POST['pass'])? $_POST['pass']: 'null';
    $npass = isset($_POST['npass'])? $_POST['npass']: 'null';
    $idUsuario = isset($_POST['username'])? $_POST['username']: 'null';
    $cerrarSesion = isset($_POST['cerrarSesion'])? $_POST['cerrarSesion']: 'null';
    $jornadaForm = isset($_POST['jornadaForm'])? $_POST['jornadaForm']: 'null';
    $userLog = isset($_POST['userLog'])? $_POST['userLog']: 'null';
    $p1l = isset($_POST['p1l'])? $_POST['p1l']: 'null';
    $p1v = isset($_POST['p1v'])? $_POST['p1v']: 'null';
    $p2l = isset($_POST['p2l'])? $_POST['p2l']: 'null';
    $p2v = isset($_POST['p2v'])? $_POST['p2v']: 'null';
    $p3l = isset($_POST['p3l'])? $_POST['p3l']: 'null';
    $p3v = isset($_POST['p3v'])? $_POST['p3v']: 'null';
    $p4l = isset($_POST['p4l'])? $_POST['p4l']: 'null';
    $p4v = isset($_POST['p4v'])? $_POST['p4v']: 'null';
    $p5l = isset($_POST['p5l'])? $_POST['p5l']: 'null';
    $p5v = isset($_POST['p5v'])? $_POST['p5v']: 'null';
    $p6l = isset($_POST['p6l'])? $_POST['p6l']: 'null';
    $p6v = isset($_POST['p6v'])? $_POST['p6v']: 'null';
    $p7l = isset($_POST['p7l'])? $_POST['p7l']: 'null';
    $p7v = isset($_POST['p7v'])? $_POST['p7v']: 'null';
    $p8l = isset($_POST['p8l'])? $_POST['p8l']: 'null';
    $p8v = isset($_POST['p8v'])? $_POST['p8v']: 'null';
    $p9l = isset($_POST['p9l'])? $_POST['p9l']: 'null';
    $p9v = isset($_POST['p9v'])? $_POST['p9v']: 'null';
    $idUser = isset($_POST['idUser'])? $_POST['idUser']: 'null';
    $jornadaInsert = isset($_POST['jornadaInsert'])? $_POST['jornadaInsert']: 'null';
    $jorn = isset($_POST['jornada'])? $_POST['jornada']: 'null';
    $partido = isset($_POST['partido'])? $_POST['partido']: 'null';
    $marcador = isset($_POST['resultado'])? $_POST['resultado']: 'null';
    
    
    $quiniela = new Quiniela;
    $getJornada = $quiniela->obtenerJornada($jornada);
    $jornadaActiva = $quiniela->obtenerFormJornada();
    $lideres = $quiniela->listarLideres();
    

    if($jornadaResCorrect != 'null'){
        $obtenerResultadosCorrectos = $quiniela->getResultsCorrect($jornadaResCorrect);
    }elseif($user != 'null'){
        $iniciarSesion = $quiniela->iniciarSesion($user, $pass);
        $usuario = isset($_SESSION['idUser'])? $_SESSION['idUser']: 'null';
    }elseif($cerrarSesion != 'null'){
        $finalSesion = $quiniela->cerrarSesion();
    }elseif($p1l != 'null'){
        if(intval($p1l) > intval($p1v)) $p1 = "g" . $p1l . "-" . $p1v;
        elseif(intval($p1v) > intval($p1l)) $p1 = "p" . $p1l . "-" . $p1v;
        else $p1 = "e" . $p1l . "-" . $p1v;
        if(intval($p2l) > intval($p2v)) $p2 = "g" . $p2l . "-" . $p2v;
        elseif(intval($p2v) > intval($p2l)) $p2 = "p" . $p2l . "-" . $p2v;
        else $p2 = "e" . $p2l . "-" . $p2v;
        if(intval($p3l) > intval($p3v)) $p3 = "g" . $p3l . "-" . $p3v;
        elseif(intval($p3v) > intval($p3l)) $p3 = "p" . $p3l . "-" . $p3v;
        else $p3 = "e" . $p3l . "-" . $p3v;
        if(intval($p4l) > intval($p4v)) $p4 = "g" . $p4l . "-" . $p4v;
        elseif(intval($p4v) > intval($p4l)) $p4 = "p" . $p4l . "-" . $p4v;
        else $p4 = "e" . $p4l . "-" . $p4v;
        if(intval($p5l) > intval($p5v)) $p5 = "g" . $p5l . "-" . $p5v;
        elseif(intval($p5v) > intval($p5l)) $p5 = "p" . $p5l . "-" . $p5v;
        else $p5 = "e" . $p5l . "-" . $p5v;
        if(intval($p6l) > intval($p6v)) $p6 = "g" . $p6l . "-" . $p6v;
        elseif(intval($p6v) > intval($p6l)) $p6 = "p" . $p6l . "-" . $p6v;
        else $p6 = "e" . $p6l . "-" . $p6v;
        if(intval($p7l) > intval($p7v)) $p7 = "g" . $p7l . "-" . $p7v;
        elseif(intval($p7v) > intval($p7l)) $p7 = "p" . $p7l . "-" . $p7v;
        else $p7 = "e" . $p7l . "-" . $p7v;
        if(intval($p8l) > intval($p8v)) $p8 = "g" . $p8l . "-" . $p8v;
        elseif(intval($p8v) > intval($p8l)) $p8 = "p" . $p8l . "-" . $p8v;
        else $p8 = "e" . $p8l . "-" . $p8v;
        if(intval($p9l) > intval($p9v)) $p9 = "g" . $p9l . "-" . $p9v;
        elseif(intval($p9v) > intval($p9l)) $p9 = "p" . $p9l . "-" . $p9v;
        else $p9 = "e" . $p9l . "-" . $p9v;
        $guardarQuiniela = $quiniela->guardarQuiniela($idUser, $jornadaInsert, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9);
    }elseif($npass != 'null'){
        $cambiarPassword = $quiniela->cambiarPassword($npass, $idUsuario);
    }elseif($jorn != 'null'){
        $localVisitante = explode('-', $marcador);
        if(intval($localVisitante[0] > $localVisitante[1])) $resultado = 'g';
        elseif(intval($localVisitante[1]) > intval($localVisitante[0])) $resultado = 'p';
        else $resultado = 'e';         
        $contabilizarAciertos = $quiniela->contabilizarAciertos($jorn, $partido, $marcador, $resultado);
    }

    if(isset($_SESSION['idUser'])){
        $comprobarQuiniela = $quiniela->comprobarQuiniela($_SESSION['idUser']);
    }else{
        $comprobarQuiniela = false;
    }

    $usuario = isset($_SESSION['idUser'])? $_SESSION['idUser']: 'null';
    $getResultados = $quiniela->getResults($jornada, $usuario);
    
    
    require_once './views/home.view.php';