<?php
    $jornada = isset($_GET['jornada'])? $_GET['jornada']: 1;
    $jornadaResCorrect = isset($_POST['jornadaResCorrect'])? $_POST['jornadaResCorrect']:"null";
    $user = isset($_POST['user'])? $_POST['user']: 'null';
    $pass = isset($_POST['pass'])? $_POST['pass']: 'null';
    $npass = isset($_POST['npass'])? $_POST['npass']: 'null';
    $username = isset($_POST['username'])? $_POST['username']: 'null';
    $cerrarSesion = isset($_POST['cerrarSesion'])? $_POST['cerrarSesion']: 'null';
    $jornadaForm = isset($_POST['jornadaForm'])? $_POST['jornadaForm']: 'null';
    $userLog = isset($_POST['userLog'])? $_POST['userLog']: 'null';
    $p1 = isset($_POST['p1'])? $_POST['p1']: 'null';
    $p2 = isset($_POST['p2'])? $_POST['p2']: 'null';
    $p3 = isset($_POST['p3'])? $_POST['p3']: 'null';
    $p4 = isset($_POST['p4'])? $_POST['p4']: 'null';
    $p5 = isset($_POST['p5'])? $_POST['p5']: 'null';
    $p6 = isset($_POST['p6'])? $_POST['p6']: 'null';
    $p7 = isset($_POST['p7'])? $_POST['p7']: 'null';
    $p8 = isset($_POST['p8'])? $_POST['p8']: 'null';
    $p9 = isset($_POST['p9'])? $_POST['p9']: 'null';
    $idUser = isset($_POST['idUser'])? $_POST['idUser']: 'null';
    $jornadaInsert = isset($_POST['jornadaInsert'])? $_POST['jornadaInsert']: 'null';
    $jorn = isset($_POST['jornada'])? $_POST['jornada']: 'null';
    $partido = isset($_POST['partido'])? $_POST['partido']: 'null';
    $resultado = isset($_POST['resultado'])? $_POST['resultado']: 'null';
    
    
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
    }elseif($p1 != 'null'){
        $guardarQuiniela = $quiniela->guardarQuiniela($idUser, $jornadaInsert, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9);
    }elseif($npass != 'null'){
        $cambiarPassword = $quiniela->cambiarPassword($npass, $username);
    }elseif($jorn != 'null'){
        $contabilizarAciertos = $quiniela->contabilizarAciertos($jorn, $partido, $resultado);
    }

    if(isset($_SESSION['idUser'])){
        $comprobarQuiniela = $quiniela->comprobarQuiniela($_SESSION['idUser']);
    }else{
        $comprobarQuiniela = false;
    }

    $usuario = isset($_SESSION['idUser'])? $_SESSION['idUser']: 'null';
    $getResultados = $quiniela->getResults($jornada, $usuario);
    
    
    require_once './views/home.view.php';