<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quiniela 66</title>
    <link rel="stylesheet" href="./css/bootstrap-grid.css">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./fonts/fonts.css">
</head>
<body>
    <div class="contImg">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="./">Quiniela 66</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#resultados">Resultados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#quiniela">Quiniela</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#puntuacion">Puntuación</a>
                    </li>
                    <?php if(isset($_SESSION['user']) && $_SESSION['user'] ==  "brian"): ?>
                    <li class="nav-item">
                        <a id="addResultado" class="nav-link" href="#resultadoCorrecto">Agregar resultado</a>
                    </li>
                    <?php endif; ?>

                    <?php if(isset($_SESSION['user'])): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userLog" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo ucwords($_SESSION['user']); ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item text-center" id="cerrarSesion" href="./index.php?jornada=<?php echo $jornada; ?>">Cerrar sesión</a>
                            <a class="nav-link dropdown-toggle text-center px-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Cambia contraseña
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <form class="px-4 py-3" method="POST" action="./index.php?jornada=<?php echo $jornada; ?>">
                                    <div class="form-group">
                                        <label for="">Nuevo password</label>
                                        <input type="password" class="form-control" id="nuevoPass" placeholder="Contraseña" name="npass" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Confirme password<a href=""></a></label>
                                        <input type="password" class="form-control" id="confirmPass" placeholder="Contraseña" name="consfirmPass" required>
                                        <input type="hidden" name="username" value="<?php echo $_SESSION['idUser']; ?>">
                                    </div>
                                    <button type="submit" name="login" class="btn btn-primary" id="cambiarPass">Cambiar</button>
                                </form>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </li>

                    <?php else: ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Usuario
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form class="px-4 py-3" method="POST" action="./index.php?jornada=<?php echo $jornada; ?>">
                                <div class="form-group">
                                    <label for="user">Usuario</label>
                                    <input type="text" class="form-control" id="user" placeholder="Usuario" name="user" required>
                                </div>
                                <div class="form-group">
                                    <label for="pass">Contraseña<a href=""></a></label>
                                    <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary">Iniciar Sesión</button>
                            </form>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-center" id="crearUsuario" href="login">Registrarme ahora</a>
                        </div>
                    </li>
                    <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center py-5" id="resultados">
            <p class="h3 col-12 text-center mb-4">Resultados</p>
            <div class="col-12 text-center mb-3 row justify-content-center" id="selectJ">
                <select name="jornadas" id="jornadas" class="form-control">
                    <?php for($i=1; $i<18; $i++): ?>
                    <option value="<?php echo $i; ?>">Jornada <?php echo $i; ?></a></option>
                    <?php endfor; ?>
                </select>    
            </div>
            <div class="col-12 col-lg-10 text-center">
                <table class="table text-center table-striped table-hover table-responsive-md">
                    <thead class="thead-dark">
                        <tr>
                            <th></th>
                            <?php
                                $j = 1;
                                for($i=1; $i<10; $i++): 
                            ?>
                            <th class="res<?php echo $i; ?>"><img src="./imgs/equipos/<?php echo $getJornada[0][$j]; ?>.png" class="j<?php echo $i; ?>l local" width="22px">vs<img src="./imgs/equipos/<?php echo $getJornada[0][$j+1]; ?>.png" class="j<?php echo $i; ?>v visitante" width="22px"></th>
                            <?php 
                                $j += 2;
                                endfor; 
                            ?>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white">
                        <?php 
                            if(!empty($getResultados)):
                                foreach($getResultados as $resultado):
                        ?>
                            <tr>
                                <td class="participante<?php echo $resultado['idParticipante'] ?> py-0 px-2"><img src="./imgs/participantes/<?php echo $resultado['userName']; ?>.jpg" alt="<?php echo $resultado['nombre']; ?>" height='40px' width='30'></td>
                                <?php for($i=1; $i<10; $i++): ?>
                                <td title='<?php echo $resultado['j'.$i] ?>' class='res<?php echo $i; ?>'><?php echo substr($resultado['j'.$i], 1) ?></td>
                                <?php endfor; ?>
                            </tr>
                        <?php 
                                endforeach;
                            else:
                        ?>
                            <tr>
                                <td colspan="10">No se encontraron resultados</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row formQuiniela text-white py-5 justify-content-center" id="puntuacion">
            <div class="col-12 col-lg-10 text-center my-3">
                <p class="h4 text-center mb-3">Tabla de puntuación</p>
                <table class="table bg-white">
                    <thead class="thead-dark text-white">
                        <tr>
                            <th></th>
                            <th>Jugador</th>
                            <th>Aciertos Totales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lideres as $lider): ?>
                        <tr>
                            <th class="m-0 p-0 text-center"><img src="./imgs/participantes/<?php echo $lider['userName']; ?>.jpg" alt="" width="40px"></th>
                            <td class="text-center fullname"><?php echo ucwords($lider['nombre']) . " " . ucwords($lider['apellido']); ?></td>
                            <td class="text-center"><?php echo $lider['aciertosTotales']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($jornadaActiva && !$comprobarQuiniela && isset($_SESSION['user'])): ?>
        
        <div class="row text-dark py-5 justify-content-center" id="quiniela">
            <div class="col-12 col-lg-10 text-center">
                <p class="h4 text-center mb-3 numeroJornada">Jornada <span><?php echo $jornadaActiva[0][0]; ?></span></p>
                <form action="./index.php?jornada=<?php echo $jornadaActiva[0][0]; ?>" method="post" class="bg-white py-4">
                    <div class="row my-3">
                        <div class="col text-center">
                            <p class="text-dark font-weight-bold">Local</p>
                        </div>
                        <div  class="col text-center">
                            <p class="text-dark font-weight-bold">Visitante</p>
                        </div>
                    </div>
                    <?php 
                        $c=1;
                        for($i=1; $i<10; $i++): 
                    ?>
                        <div class="row my-3 filaPrartido">
                            <div class="col text-center">
                                <input required type="number" name="p<?php echo $i;?>l" id="goles_local" max="20" min='0'>
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c]; ?>.png" width="30px"></label>
                            </div>
                            <div  class="col text-center">
                                <label for=""><img src="./imgs/equipos/<?php echo $jornadaActiva[0][$c+1]; ?>.png" width="30px"></label>
                                <input required type="number" name="p<?php echo $i;?>v" id="goles_visitante" max="20" min='0'>
                            </div>
                        </div>
                    <?php  
                        $c = $c+2;
                        endfor; 
                    ?>
                        <div class="col">
                            <input type="hidden" name="jornadaInsert" value="<?php echo $jornadaActiva[0][0]; ?>">
                        </div>
                        <div class="col">
                            <input type="hidden" name="idUser" value="<?php echo $_SESSION['idUser']; ?>">
                        </div>
                        <div class="col text-center">
                            <input type="submit" value="Guardar" class="btn btn-primary">
                        </div>
                </form>
            </div>
        </div>
        <?php endif; ?>
        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == 'brian'): ?>
        <div class="row text-white py-5 justify-content-center displayNone" id="resultadoCorrecto">
            <div class="col-12 col-lg-10 text-center">
                <p class="h4 text-dark mb-3">Agregar un resultado</p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" class="row justify-content-around px-3" method="post">
                    <input type="hidden" name="jornada" id="jornaCorr" val="">
                    <select name="partido" id="partido" class="form-control col-12 col-md-4 mb-3">
                        <?php 
                            $j = 1;
                            for($i=1; $i<10; $i++): 
                        ?>
                        <option value="j<?php echo $i; ?>"><?php echo $getJornada[0][$j] . " "; ?>vs <?php echo $getJornada[0][$j+1]; ?></option>
                        <?php 
                            $j += 2;
                            endfor;
                        ?>
                    </select>
                    <input type="text" name="resultado" id="resultado" class="form-control col-12 col-md-4 mb-3">
                    <input type="submit" value="Guardar" class="btn btn-primary">
                </form>
            </div>
        </div>
        <?php endif; ?>
        <footer class="page-footer font-small">
            <div class="text-center py-3 font-weight-bold ">©<?php echo date('Y') ?> Derechos reservados - Brian Esparza
            </div>
        </footer>
    </div>
    <script src="./js/jquery-3.3.1.min.js"></script>
    <script src="./js/js.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>